<?php

namespace App\Responses;

use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class BaseApiResponse extends Response
{
    private array $template = [
        'status' => null,
        'data' => null,
        'errors' => null,
        'message' => null
    ];

    public function data($data, $message = null): BaseApiResponse
    {
        $this->template['status'] = $this->isSuccessful();
        $this->template['data'] = $data;
        $this->template['message'] = $message;

        return $this->setContent($this->template);
    }

    public function error($error, $message = null): BaseApiResponse
    {
        if ($this->isSuccessful()) {
            $this->statusCode = self::HTTP_BAD_REQUEST;
        }

        $this->template['status'] = false;

        if ($error) {
            $this->template['errors'] = is_string($error)
                ? [$error]
                : $this->transformDotsToArrayErrors($error);
        }

        $this->template['message'] = $message;

        return $this->setContent($this->template);
    }

    private function transformDotsToArrayErrors(array $dirtyErrors): array
    {
        $errors = [];

        foreach ($dirtyErrors as $key => $value) {
            Arr::set($errors, $key, $value);
        }

        return $errors;
    }
}
