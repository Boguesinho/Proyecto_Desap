package com.example.intlok.api;

import com.example.intlok.models.LoginRequest;
import com.example.intlok.models.LoginResponse;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.POST;

public interface InterfaceAPI {

    @POST("login")
    Call<LoginResponse> userlogin(@Body LoginRequest loginRequest);
}
