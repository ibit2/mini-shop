<?php

namespace App\Http\Controllers\Business;

use App\Http\Requests\Business\GoodsRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Business\GoodsCollection;
use App\Http\Resources\Business\GoodsResource;
use App\Models\GoodsSpec;
use App\Models\GoodsSpecValue;
use App\Services\GoodsService;

class GoodsController extends BaseController
{
    protected $goodsService;

    public function __construct()
    {
        $this->goodsService = new GoodsService();
    }

    //分页列表
    public function list(GoodsRequest $request)
    {
        $rs = [];
        $limit = $request->input('pageSize');
        $rs['count'] = $this->goodsService->getCount($request);
        $goods = $this->goodsService->list($request, $limit, ['goodsCategory']);
        $rs['goods'] = new GoodsCollection($goods);
        return $this->success($rs);
    }


    //详情
    public function detail(GoodsRequest $request)
    {
        $id = $request->input('id');
        $goods = $this->goodsService->detail($id, ['goodsCategory']);
        return $this->success(new GoodsResource($goods));
    }

    //添加
    public function add(GoodsRequest $request)
    {
        try {
            \DB::beginTransaction();
            $isMultipleSpec = $request->input('isMultipleSpec');
            $data = $request->all();
            if ($isMultipleSpec) {
                //多规格，商品表存默认规格值
                $goodsSpecs = $request->input('goodsSpecs');
                $goodsSkus = $request->input('goodsSkus');
                $goodsSpecsNum=1;
                foreach ($goodsSpecs as $goodsSpec){
                    $goodsSpecsNum*=count($goodsSpec['value']);
                }
                $goodsSkusNum=count($goodsSkus);
                if($goodsSpecsNum!=$goodsSkusNum){
                    return $this->fail('sku生成数量不对');
                }
                foreach ($goodsSkus as $goodsSku) {
                    if ($goodsSku['isDefault']) {
                        $data['salePrice'] = $goodsSku['salePrice'];
                        if (isset($goodsSku['linePrice'])) {
                            $data['linePrice'] = $goodsSku['linePrice'];
                        }
                        $data['stockNum'] = $goodsSku['stockNum'];
                    }
                }
            }
            $goods = $this->goodsService->add($data);
            $goodsId = $goods->id;
            $merchantId = $request->input('merchantId');
            if ($isMultipleSpec) {
                //多规格，存入规格和sku
                $goodsSpecs = $request->input('goodsSpecs');
                $goodsSkus = $request->input('goodsSkus');
                $goodsSpecValuePath = [];
                foreach ($goodsSpecs as $goodsSpec) {
                    $goodsSpecData = [
                        'name' => $goodsSpec['name'],
                        'goodsId' => $goodsId,
                        'merchantId' => $merchantId,
                    ];
                    $goodsSpecId = GoodsSpec::create($goodsSpecData)->id;
                    foreach ($goodsSpec['value'] as $value) {
                        $goodsSpecValueData = [
                            'value' => $value,
                            'goodsSpecId' => $goodsSpecId,
                        ];
                        $goodsSpecValueId = GoodsSpecValue::create($goodsSpecValueData)->id;
                        $goodsSpecValuePath[] = "{$goodsSpecId}_{$goodsSpecValueId}";
                    }
                }
                foreach ($goodsSkus as $key => $goodsSku) {
                    $goodsSkus[$key]['goodsSpecValuePath'] = $goodsSpecValuePath[$key];
                }

                $goods->goodsSkus()->createMany($goodsSkus);
            }
            \DB::commit();
            return $this->success();
        } catch (\Exception $exception) {
            \DB::rollBack();
            \Log::error($exception->getMessage(), ['exception' => $exception]);
            return $this->fail();
        }

    }

    //修改
    public function update(GoodsRequest $request)
    {
        $id = $request->input('id');
        $data = $request->all();
        $this->goodsService->update($id, $data);
        return $this->success();
    }

    //单删除
    public function delete(GoodsRequest $request)
    {
        $id = $request->input('id');
        $this->goodsService->delete($id);
        return $this->success();
    }
}
