package com.example.supplychainmanagement;
import android.util.JsonReader;

import org.json.JSONArray;
import org.json.JSONObject;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.Headers;
import retrofit2.http.POST;
public interface RetrofitAPICall {
    String URL_BASE = "http://18.209.66.151/";

    @Headers({"Content-Type: application/json","Accept: application/json","source-name: streamlining-inventory-management"})
    @POST("add-company")
    public Call<CompanyObject> addCompany(@Body String body);

}
