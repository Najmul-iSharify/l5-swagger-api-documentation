<?php

namespace App\Swagger;

/**
 * @OA\Info(
 *    version="1.0.0",
 *    title="Laravel Swagger API documentation",
 *    description="This is a sample Laravel API documentation",
 * )
 */
class CategoryPath
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Get list of categories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", description="Category ID", example=1),
     *                 @OA\Property(property="name", type="string", description="Name of the category", example="Electronics"),
     *                 @OA\Property(property="description", type="string", description="Description of the category", example="Category for electronic products")
     *             )
     *         )
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/categories",
     *     summary="Create a new category",
     *     tags={"Categories"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"name", "description"},
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="The name of the category",
     *                     example="Clothing",
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     type="string",
     *                     description="A brief description of the category",
     *                     example="Apparel and garments",
     *                 )
     *             )
     *         ),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"name", "description"},
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="The name of the category",
     *                     example="Clothing",
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     type="string",
     *                     description="A brief description of the category",
     *                     example="Apparel and garments",
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Category created",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="Category created"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="name", type="string", example="Clothing"),
     *                 @OA\Property(property="description", type="string", example="Apparel and garments"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2025-01-09T06:51:07.000000Z"),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-01-09T06:51:07.000000Z"),
     *                 @OA\Property(property="id", type="integer", example=16)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The name field is required."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 additionalProperties={
     *                     @OA\Property(property="name", type="array", @OA\Items(type="string", example="The name field is required.")),
     *                     @OA\Property(property="description", type="array", @OA\Items(type="string", example="The description field is required."))
     *                 }
     *             )
     *         )
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     summary="Get a category by ID",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", description="ID of the category to retrieve")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", description="Category ID", example=1),
     *             @OA\Property(property="name", type="string", description="Name of the category", example="Clothing"),
     *             @OA\Property(property="description", type="string", description="Description of the category", example="Apparel and garments")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found"
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/categories/{id}",
     *     summary="Update a category",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", description="ID of the category to update")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"name", "description"},
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="Updated name of the category",
     *                     example="Updated Category"
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     type="string",
     *                     description="Updated description of the category",
     *                     example="Updated description"
     *                 )
     *             )
     *         ),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"name", "description"},
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="Updated name of the category",
     *                     example="Updated Category"
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     type="string",
     *                     description="Updated description of the category",
     *                     example="Updated description"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category updated",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", description="Category ID", example=1),
     *             @OA\Property(property="name", type="string", description="Name of the category", example="Updated Category"),
     *             @OA\Property(property="description", type="string", description="Description of the category", example="Updated description"),
     *             @OA\Property(property="created_at", type="string", format="date-time", example="2025-01-08T11:25:06.000000Z"),
     *             @OA\Property(property="updated_at", type="string", format="date-time", example="2025-01-09T06:56:20.000000Z")
     *         )
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     summary="Delete a category",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", description="ID of the category to delete")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Category deleted"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found"
     *     )
     * )
     */
    public function delete() {}
}
