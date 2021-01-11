package com.example.intlok.api;

import com.example.intlok.models.Follower;
import com.example.intlok.models.LoginRequest;
import com.example.intlok.models.LoginResponse;
import com.example.intlok.models.RegisterAccountRequest;
import com.example.intlok.models.RegisterAccountResponse;
import com.example.intlok.models.RegisterUserRequest;
import com.example.intlok.models.RegisterUserResponse;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.Header;
import retrofit2.http.POST;

public interface InterfaceAPI {

    @POST("login")
    Call<LoginResponse> userlogin(@Body LoginRequest loginRequest);

    @POST("register")
    Call<RegisterUserResponse> createUser(@Body RegisterUserRequest registerUserRequest);

    @POST("register/cuenta")
    Call<RegisterAccountResponse> createAccount(@Body RegisterAccountRequest registerAccountRequest, @Header("Authorization") String token);

    @GET("getFollowers")
    Call<List<Follower>> getFollowers();
}
