package com.example.vuduc.androidapplication;

import android.net.Uri;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONException;
import org.json.JSONObject;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        final EditText username = findViewById(R.id.editUsername);
        final EditText password = findViewById(R.id.editPassword);
        final TextView status = findViewById(R.id.textViewDisplayStatus);
        final TextView calorie = findViewById(R.id.textViewDisplayCalorie);
        Button btnDN = findViewById(R.id.button);
        btnDN.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String textUsername = username.getText().toString();
                String textPassword = password.getText().toString();
                Uri.Builder urlBuilder = new Uri.Builder();
                urlBuilder.scheme("http");
                urlBuilder.authority("10.0.2.2");
                urlBuilder.appendEncodedPath("project/webservice.php");
                urlBuilder.appendQueryParameter("username", textUsername);
                urlBuilder.appendQueryParameter("pass", textPassword);
                String url = urlBuilder.build().toString();
                JsonObjectRequest jsonObjectRequest = new JsonObjectRequest
                        (Request.Method.GET, url, null, new Response.Listener<JSONObject>() {
                            @Override
                            public void onResponse(JSONObject response) {
                                status.setText("Success");
                                try {
                                    String gender = response.getString("gender");
                                    Double calorie_count;
                                    int weight = response.getInt("weight");
                                    int height = response.getInt("height");
                                    int age = response.getInt("age");
                                    if(gender.equals("male"))
                                        calorie_count = 13.397 * weight + 4.799 * height - 5.677 * age + 88.362;
                                    else calorie_count = 9.247 * weight + 3.098 * height - 4.330 * age + 447.593;
                                    String formato = String.format("%.2f", calorie_count);
                                    calorie.setText(formato);
                                } catch(JSONException e)
                                {
                                    Log.e("ERROR", e.getMessage(), e);
                                    calorie.setText("Error");
                                }
                            }
                        }, new Response.ErrorListener() {
                            @Override
                            public void onErrorResponse(VolleyError error) {
                                status.setText("Fail");
                            }
                        });
                MySingleton.getInstance(getApplicationContext()).addToRequestQueue(jsonObjectRequest);
            }
        });
    }

}
