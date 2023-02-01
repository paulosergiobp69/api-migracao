<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetabelaDeTesteAPIRequest;
use App\Http\Requests\API\UpdatetabelaDeTesteAPIRequest;
use App\Models\tabelaDeTeste;
use App\Repositories\tabelaDeTesteRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class tabelaDeTesteController
 */

class tabelaDeTesteAPIController extends AppBaseController
{
    private tabelaDeTesteRepository $tabelaDeTesteRepository;

    public function __construct(tabelaDeTesteRepository $tabelaDeTesteRepo)
    {
        $this->tabelaDeTesteRepository = $tabelaDeTesteRepo;
    }

    /**
     * @OA\Get(
     *      path="/tabela-de-testes",
     *      summary="gettabelaDeTesteList",
     *      tags={"tabelaDeTeste"},
     *      description="Get all tabelaDeTestes",
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
     *                  @OA\Items(ref="#/components/schemas/tabelaDeTeste")
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
        $tabelaDeTestes = $this->tabelaDeTesteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tabelaDeTestes->toArray(), 'Tabela De Testes retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/tabela-de-testes",
     *      summary="createtabelaDeTeste",
     *      tags={"tabelaDeTeste"},
     *      description="Create tabelaDeTeste",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/tabelaDeTeste")
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
     *                  ref="#/components/schemas/tabelaDeTeste"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatetabelaDeTesteAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $tabelaDeTeste = $this->tabelaDeTesteRepository->create($input);

        return $this->sendResponse($tabelaDeTeste->toArray(), 'Tabela De Teste saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/tabela-de-testes/{id}",
     *      summary="gettabelaDeTesteItem",
     *      tags={"tabelaDeTeste"},
     *      description="Get tabelaDeTeste",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of tabelaDeTeste",
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
     *                  ref="#/components/schemas/tabelaDeTeste"
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
        /** @var tabelaDeTeste $tabelaDeTeste */
        $tabelaDeTeste = $this->tabelaDeTesteRepository->find($id);

        if (empty($tabelaDeTeste)) {
            return $this->sendError('Tabela De Teste not found');
        }

        return $this->sendResponse($tabelaDeTeste->toArray(), 'Tabela De Teste retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/tabela-de-testes/{id}",
     *      summary="updatetabelaDeTeste",
     *      tags={"tabelaDeTeste"},
     *      description="Update tabelaDeTeste",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of tabelaDeTeste",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/tabelaDeTeste")
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
     *                  ref="#/components/schemas/tabelaDeTeste"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatetabelaDeTesteAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var tabelaDeTeste $tabelaDeTeste */
        $tabelaDeTeste = $this->tabelaDeTesteRepository->find($id);

        if (empty($tabelaDeTeste)) {
            return $this->sendError('Tabela De Teste not found');
        }

        $tabelaDeTeste = $this->tabelaDeTesteRepository->update($input, $id);

        return $this->sendResponse($tabelaDeTeste->toArray(), 'tabelaDeTeste updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/tabela-de-testes/{id}",
     *      summary="deletetabelaDeTeste",
     *      tags={"tabelaDeTeste"},
     *      description="Delete tabelaDeTeste",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of tabelaDeTeste",
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
        /** @var tabelaDeTeste $tabelaDeTeste */
        $tabelaDeTeste = $this->tabelaDeTesteRepository->find($id);

        if (empty($tabelaDeTeste)) {
            return $this->sendError('Tabela De Teste not found');
        }

        $tabelaDeTeste->delete();

        return $this->sendSuccess('Tabela De Teste deleted successfully');
    }
}
