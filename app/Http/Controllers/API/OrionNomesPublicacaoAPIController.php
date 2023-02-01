<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrionNomesPublicacaoAPIRequest;
use App\Http\Requests\API\UpdateOrionNomesPublicacaoAPIRequest;
use App\Models\OrionNomesPublicacao;
use App\Repositories\OrionNomesPublicacaoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class OrionNomesPublicacaoController
 */

class OrionNomesPublicacaoAPIController extends AppBaseController
{
    private OrionNomesPublicacaoRepository $orionNomesPublicacaoRepository;

    public function __construct(OrionNomesPublicacaoRepository $orionNomesPublicacaoRepo)
    {
        $this->orionNomesPublicacaoRepository = $orionNomesPublicacaoRepo;
    }

    /**
     * @OA\Get(
     *      path="/orion-nomes-publicacaos",
     *      summary="getOrionNomesPublicacaoList",
     *      tags={"OrionNomesPublicacao"},
     *      description="Get all OrionNomesPublicacaos",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/OrionNomesPublicacao")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $orionNomesPublicacaos = $this->orionNomesPublicacaoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($orionNomesPublicacaos->toArray(), 'Orion Nomes Publicacaos retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/orion-nomes-publicacaos",
     *      summary="createOrionNomesPublicacao",
     *      tags={"OrionNomesPublicacao"},
     *      description="Create OrionNomesPublicacao",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/OrionNomesPublicacao")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/OrionNomesPublicacao"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateOrionNomesPublicacaoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $orionNomesPublicacao = $this->orionNomesPublicacaoRepository->create($input);

        return $this->sendResponse($orionNomesPublicacao->toArray(), 'Orion Nomes Publicacao saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/orion-nomes-publicacaos/{id}",
     *      summary="getOrionNomesPublicacaoItem",
     *      tags={"OrionNomesPublicacao"},
     *      description="Get OrionNomesPublicacao",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of OrionNomesPublicacao",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/OrionNomesPublicacao"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id): JsonResponse
    {
        /** @var OrionNomesPublicacao $orionNomesPublicacao */
        $orionNomesPublicacao = $this->orionNomesPublicacaoRepository->find($id);

        if (empty($orionNomesPublicacao)) {
            return $this->sendError('Orion Nomes Publicacao not found');
        }

        return $this->sendResponse($orionNomesPublicacao->toArray(), 'Orion Nomes Publicacao retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/orion-nomes-publicacaos/{id}",
     *      summary="updateOrionNomesPublicacao",
     *      tags={"OrionNomesPublicacao"},
     *      description="Update OrionNomesPublicacao",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of OrionNomesPublicacao",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/OrionNomesPublicacao")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/OrionNomesPublicacao"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateOrionNomesPublicacaoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var OrionNomesPublicacao $orionNomesPublicacao */
        $orionNomesPublicacao = $this->orionNomesPublicacaoRepository->find($id);

        if (empty($orionNomesPublicacao)) {
            return $this->sendError('Orion Nomes Publicacao not found');
        }

        $orionNomesPublicacao = $this->orionNomesPublicacaoRepository->update($input, $id);

        return $this->sendResponse($orionNomesPublicacao->toArray(), 'OrionNomesPublicacao updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/orion-nomes-publicacaos/{id}",
     *      summary="deleteOrionNomesPublicacao",
     *      tags={"OrionNomesPublicacao"},
     *      description="Delete OrionNomesPublicacao",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of OrionNomesPublicacao",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id): JsonResponse
    {
        /** @var OrionNomesPublicacao $orionNomesPublicacao */
        $orionNomesPublicacao = $this->orionNomesPublicacaoRepository->find($id);

        if (empty($orionNomesPublicacao)) {
            return $this->sendError('Orion Nomes Publicacao not found');
        }

        $orionNomesPublicacao->delete();

        return $this->sendSuccess('Orion Nomes Publicacao deleted successfully');
    }
}
