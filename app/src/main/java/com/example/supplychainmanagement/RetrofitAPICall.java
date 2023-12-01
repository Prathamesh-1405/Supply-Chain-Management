package com.example.supplychainmanagement;
import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.Headers;
import retrofit2.http.POST;
public interface RetrofitAPICall {
    @Headers({"Accept: application/json","source-name: streamlining-inventory-management"})
    @POST("add-company")
        // on below line specifying the method name which we have to call.
    Call<CompanyObject> addCompany(@Body CompanyObject companyObject);

}
