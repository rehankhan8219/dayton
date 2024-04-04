<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Api\Traits\ApiResponse;
use App\Models\HelpCategory;

class ContactController
{
    use ApiResponse;

    /**
     * Request
     */
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * @return json
     */
    public function index()
    {
        try {
            $response['live_chat_script'] = setting('script');

            return $this->respondWithSuccess('Data returned successfully!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
    
    /**
     * @return json
     */
    public function getHelpCenterDetails()
    {
        try {
            $helpCategories = HelpCategory::with('helpCenters')->get();

            if($helpCategories->isEmpty()) {
                return $this->respondWithError('Help center details is not added yet!', 200);
            }

            $response = [];
            foreach($helpCategories as $index => $helpCategory) {
                $response[$index]['id'] = $helpCategory->id;
                $response[$index]['name'] = $helpCategory->name;
                $response[$index]['details'] = $helpCategory->helpCenters->map->only('id', 'title', 'explanation');
            }

            return $this->respondWithSuccess('Data returned successfully!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }

    /**
     * @return json
     */
    public function store()
    {
        try {
            $rules = [
                'subject' => ['required', 'string', 'max:199'],
                'message' => ['required', 'string', 'max:1000'],
            ];
    
            $validator = $this->validateParams($this->request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->respondWithError($validator->errors()->first(), 200);
            }
    
            activity('helpcenter')
                ->withProperties([
                    'helpcenter' => [
                        'subject' => $this->request->subject,
                        'message' => $this->request->message
                    ],
                ])
                ->log($this->request->message);
    
            return $this->respondWithSuccess('Request submitted successfully!', 200);
            
        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
}
