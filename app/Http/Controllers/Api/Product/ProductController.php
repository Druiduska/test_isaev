<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Dto\Factory\Product\ProductDtoFromArray;
use App\Http\Requests\Api\IndexRequest;
use App\Http\Requests\Api\Product\SaveProductRequest;
use App\Http\Resources\Api\PaginationListResponseResource;
use App\Http\Resources\Api\Product\ProductResource;
use App\Http\Resources\Api\Success\ResponseSuccessResource;
use App\Logic\UseCases\Product\IndexProduct;
use App\Logic\UseCases\Product\SaveProduct;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Товары
 */
class ProductController extends Controller
{
    /**
     * @OA\Get(
     *
     *     path="/api/product",
     *     tags={"Товары"},
     *     summary="Получить список товаров",
     *     security={{ "bearerAuth": {} }},
     *     @OA\Parameter(ref="#/components/parameters/IndexRequest:page"),
     *     @OA\Parameter(ref="#/components/parameters/IndexRequest:per_page"),
     *     @OA\Parameter(ref="#/components/parameters/IndexRequest:q"),
     *     @OA\Parameter(ref="#/components/parameters/IndexRequest:sort_field"),
     *     @OA\Parameter(ref="#/components/parameters/IndexRequest:sort_direction"),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="result",
     *                 type="string",
     *                 example="LIST"
     *             ),
     *             @OA\Property(
     *                 property="request_uuid",
     *                 type="string",
     *                 example="d6a840e4-4b42-4f87-bf1c-2d88a7f8a212"
     *             ),
     *                 @OA\Property(
     *                     property="data",
     *                     type="array",
     *                     @OA\Items(ref="#/components/schemas/ProductResource")
     *                 ),
     *                 @OA\Property(
     *                     property="pagination",
     *                     type="object",
     *                     @OA\Property(property="total", type="integer", example=50),
     *                     @OA\Property(property="count", type="integer", example=10),
     *                     @OA\Property(property="per_page", type="integer", example=10),
     *                     @OA\Property(property="current_page", type="integer", example=1),
     *                     @OA\Property(property="total_pages", type="integer", example=5)
     *                 )
     *         ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UnauthorizedErrorResource"
     *          ),
     *      ),
     *
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/ForbiddenErrorResource"
     *          ),
     *      ),
     *
     *     @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *               ref="#/components/schemas/ValidationErrorResource"
     *          ),
     *      ),
     *
     *     @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(
     *             ref="#/components/schemas/InternalServerErrorResource"
     *          ),
     *     )
     *   ),
     * )
     */
    public function index(IndexRequest $request): JsonResource
    {
        $dataList = app(IndexProduct::class)(
            $request->validated('sort_field'),
            $request->validated('sort_direction'),
            $request->validated('q') ?? [],
        );

        $paginatedList = $dataList->paginate($request->validated('per_page'));

        return new PaginationListResponseResource(
            resource: $paginatedList,
            data: ProductResource::collection($paginatedList)
        );
    }

    /**
     * @OA\Post(
     *    path="/api/product",
     *    tags={"Товары"},
     *    summary="Создать новый товар",
     *    security={{ "bearerAuth": {} }},
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(
     *            allOf={
     *                @OA\Schema(ref="#/components/schemas/SaveProductRequest")
     *            }
     *        )
     *    ),
     *
     *    @OA\Response(
     *        response=200,
     *        description="Успешный ответ",
     *        @OA\JsonContent(
     *                ref="#/components/schemas/ResponseSuccessResource"
     *        )
     *   ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UnauthorizedErrorResource"
     *          ),
     *      ),
     *
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/ForbiddenErrorResource"
     *          ),
     *      ),
     *
     *     @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *               ref="#/components/schemas/ValidationErrorResource"
     *          ),
     *      ),
     *
     *     @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(
     *             ref="#/components/schemas/InternalServerErrorResource"
     *          ),
     *     )
     * )
     */
    public function save(SaveProductRequest $request): JsonResponse
    {
        $dto = app(ProductDtoFromArray::class)($request->validated());
        $model = app(SaveProduct::class)($dto);
        $message = new ResponseSuccessResource($model);

        return $message->response();
    }
}
