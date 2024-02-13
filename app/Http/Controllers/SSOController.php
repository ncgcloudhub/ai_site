<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SSOController extends Controller
{
    public function ImportTaxCustomers(Request $request){
        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5YjQ3YjdkNS1iZWE0LTRjYWUtYjI4OC05ZTEwNmQ3Yzc1NWEiLCJqdGkiOiIyODZiZmQ1YmIyNjg0MjQ0YTlmMDY3ZjhhMzg5ZjUxM2FkYzM0N2NiMWY0OWE0OTk1MjNhMGE5NzY0NWEwMzg3MzQxZDcyNDczYzkxZTNmOSIsImlhdCI6MTcwNzMzMDk5NC42Mjk5NjgsIm5iZiI6MTcwNzMzMDk5NC42Mjk5NywiZXhwIjoxNzA4NjI2OTk0LjYxMjk1Mywic3ViIjoiMSIsInNjb3BlcyI6W119.ZcgyezT9hlH7xW3K27J8E-8pg7ofYhbB9DXz5CS610E8QJPc5bTBxImGbADFUChi9JcNUb2sv8oiYEmyLeFFW4RZkYKfCEkJPPTvfKG2jAmBSn6JdfkvK2O7rZlLVhK-U9Ypy-mwfLRBq8e1BG9l1nLOWeweqcNSOlOcV8o1SmsLIKtEueURRhhVIb45vDkQLCvIKrNqNq3hXx1wYVTn463hQAfnmq5R7g7jDLDY4UcyJCPMvB4gy_bR-MwkdgkWvsfZBOi0yW0UerJ2jvutkp0f2i99qBUlsGrJzw38o6MVDs_kuSUkkhAI5jen8y8Sy7418_0Zk4OYLQ8YXpRlAekgzRx7ZLku24JMxCAtC8FZN3rjJU-QlGa_iF9UBz5ZxavVqGdtYe8zXjdgbAvysyo1dbYt6cVgl8c22mJouT1jdT6lQDVa5deHY-waCCLszDAxbMM7-HG_ZvD8e-aRoCQ2cw_lavLtTGLWT1Qz9IVlzHNM57jYFrqjxeM7VdosssaF-ngywPltuK4pujb4UQSBt4GhPf08jZP15AAuZkzeJ-wzb7xtaHr-NRtuJxXIcOPyEUFv96ah1ZpupHtmbGGmkAYMebu2ynYDwC3JTO6wSQJeD0HwlE7b8SQuO1YGh15G7oqYdt7fdsuXvj8BYRKZlnMsKCQXUoGJr3iDJ0M"; // Set your access token here
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
        ])->get("http://127.0.0.1:8000/api/user");
    
        // Handle the response
        return $response->json();
	} // end method

}
