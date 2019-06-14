<?php

if(! function_exists('json'))
{
    /**
     * Creates a standardised JsonResponse object.
     *
     * @param string $message
     * @param mixed  $data
     * @param int    $status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function json(string $message, $data = null, int $status = 200)
    {
        $success = is_between($status, 200, 299);

        return response()->json(compact('success', 'status', 'message', 'data'))
            ->setStatusCode($status);
    }
}

if(! function_exists('is_between'))
{
    /**
     * Test if a given value is between two given values.
     *
     * @param $value
     * @param $low
     * @param $high
     *
     * @return bool
     */
    function is_between($value, $low, $high): bool
    {
        if($value < $low)
            return false;

        if($value > $high)
            return false;

        return true;
    }
}
