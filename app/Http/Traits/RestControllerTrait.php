<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait RestControllerTrait {

	// public function index() {
	// 	$model = self::MODEL;
	// 	return $this->successResponse($model::all());
    // }

	// public function show($id) {

	// 	$model = self::MODEL;
	// 	if ($data = $model::find($id)) {
	// 		return $this->successResponse($data);
	// 	}
	// 	return $this->notFoundResponse();
    // }

	// public function store(Request $request) {

	// 	$model = self::MODEL;
	// 	try {

	// 		$v = \Validator::make($request->all(), $this->validationRules);

	// 		if ($v->fails()) {
	// 			throw new \Exception('ValidationException');
	// 		}

	// 		$data = $model::create($request->all());
	// 		return $this->successResponse($data);
	// 	} catch (\Exception $exception) {
	// 		$data = ['errors' => $v->errors(), 'exception' => $exception->getMessage()];
	// 		return $this->errorResponse($data);
	// 	}
    // }

	// public function update(Request $request, $id) {

	// 	$model = self::MODEL;

	// 	if(!$data = $model::find($id)) {
	// 		return $this->notFoundResponse();
	// 	}

	// 	try {

	// 		$v = \Validator::make($request->all(), $this->validationRules);

	// 		if($v->fails()) {
	// 			throw new \Exception("ValidationException");
	// 		}

	// 		$data->fill($request->all());
	// 		$data->save();

	// 		return $this->successResponse($data);
	// 	} catch(\Exception $exception) {
	// 		$data = ['errors' => $v->errors(), 'exception' => $exception->getMessage()];
	// 		return $this->errorResponse($data);
	// 	}
    // }

	// public function destroy($id) {

	// 	$model = self::MODEL;

	// 	if (!$data = $model::find($id)) {
	// 		return $this->notFoundResponse();
	// 	}

	// 	$data->delete();
	// 	return $this->deletedResponse();
    // }

	protected function successResponse($data = []) {

		$response = [
			'code' => 200,
			'status' => 'success',
			'data' => $data
		];
		return response()->json($response, $response['code']);
    }

    protected function createdResponse() {

		$response = [
			'code' => 201,
			'status' => 'success',
		];
		return response()->json($response, $response['code']);
    }

    public function deletedResponse() {

        $response = [
            'code' => 202,
            'status' => 'success',
            'message' => 'Resource Deleted'
        ];
        return response()->json($response, $response['code']);
    }

	protected function notFoundResponse() {

		$response = [
			'code' => 404,
			'status' => 'error',
			'data' => 'Resource Not Found',
			'message' => 'Not Found'
		];
		return response()->json($response, $response['code']);
    }


	public function errorResponse($message = null) {

		$response = [
			'code' => 422,
			'status' => 'error',
			'message' => $message ?? 'Unprocessable Entity'
		];
		return response()->json($response, $response['code']);
	}
}
