<?php

namespace App\Http\Controllers\Api\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

/**
 * Trait ApiResponse
 * @package App\Http\Controllers\Api\Traits
 */
trait ApiResponse
{
	/**
     * @param  string      $message
     * @param  int|integer $httpCode
     * @param  array       $data
     * @param  array       $additionalData
     * @return JSON
     */
    protected function respondWithSuccess($message = "Success!", $httpCode = 200, $data = null, $additionalData = null)
    {   
        $response['success'] = 1;
        $response['message'] = $message;
        $response['data'] = $data;

        $additionalData['unread_notification_count'] = $this->unreadNotificationCount();
        $response['additional_data'] = $additionalData;
        
        // $data = $this->replaceNullWithEmptyString($data);
        return response()->json($response, $httpCode);
    }
    
    /**
     * @param  string      $message
     * @param  int|integer $httpCode
     * @param  int         $errorCode
     * @param  array       $data
     * @param  array       $additionalData
     * @return JSON
     */
    protected function respondWithError($message = "Error!", $httpCode = 500, $errorCode = null, $data = null, $additionalData = null)
    {
        $response['success'] = 0;
        $response['message'] = $message;
        $response['error_code'] = $errorCode ?? $httpCode;
        $response['data'] = $data;

        $additionalData['unread_notification_count'] = $this->unreadNotificationCount();
        $response['additional_data'] = $additionalData;
        
        // $data = $this->replaceNullWithEmptyString($data);
        return response()->json($response, $httpCode);
    }

    /**
     * [validateParams is a custom validator function]
     * @param  [array] $data [validation params]
     * @return [object]      [Success or Failure object]
     */
    public function validateParams($data, $rules, $messages = [])
    {
        return Validator::make($data, $rules, $messages);
    }

    /**
     * @return int
     */
    public function unreadNotificationCount(): int
    {
        if(auth()->check()){
            return 0;
            // return auth()->user()->notifications()->where('is_read', 0)->count();
        }
        
        return 0;
    }

    protected function replaceNullWithEmptyString($array)
    {
        if(is_null($array)){
            return $array;
        }

        if(!is_array($array)) {
            $array = $array->toArray();
        }
        
        foreach ($array as $key => $value) 
        {
            if(is_array($value))
                $array[$key] = $this->replaceNullWithEmptyString($value);
            else
            {
                if (is_null($value))
                    $array[$key] = "";
            }
        }
        return $array;
    }

    /**
     * @param User $user
     * @param bool $generateToken
     * 
     * @return Array
     */
    protected function generateLoginResponse(User $user, $generateToken = true) : array
    {
        $response = [];

        if($user){
            $response['id'] = $user->id;
            $response['name'] = $user->name;
            $response['email'] = $user->email;
            $response['phone'] = $user->phone;
            $response['avatar'] = $user->avatar;

            if($generateToken) {
                $response['token'] = $user->createToken('user-token')->plainTextToken;
            }
            else{
                $response['token'] = request()->bearerToken();
            }
        }
        return $response;
    }
}
