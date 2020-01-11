package com.example.vuduc.myapplication.activity;

/**
 * Created by admin on 4/8/2018.
 */


import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ScrollView;
import android.widget.Toast;
import android.widget.RadioButton;
import android.widget.RadioGroup;

import com.android.volley.Request.Method;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import com.example.vuduc.myapplication.R;
import com.example.vuduc.myapplication.app.AppConfig;
import com.example.vuduc.myapplication.app.AppController;
import com.example.vuduc.myapplication.helper.SQLiteHandler;
import com.example.vuduc.myapplication.helper.SessionManager;

public class RegisterActivity extends Activity {
    private static final String TAG = RegisterActivity.class.getSimpleName();
    private Button btnRegister;
    private Button btnLinkToLogin;
    private EditText inputFullName;
    private EditText inputUsername;
    private EditText inputPassword;
    private EditText inputAge;
    private EditText inputWeight;
    private EditText inputHeight;
    private RadioGroup GenderGroup;
    private RadioGroup ProgramGroup;
    private RadioGroup TrainerGroup;
    private ProgressDialog pDialog;
    private SessionManager session;
    private SQLiteHandler db;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        if (android.os.Build.VERSION.SDK_INT >= 21) {
            Window window = this.getWindow();
            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
            window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
            window.setStatusBarColor(this.getResources().getColor(R.color.Black));
        }


        inputFullName = (EditText) findViewById(R.id.name);
        inputUsername = (EditText) findViewById(R.id.username);
        inputPassword = (EditText) findViewById(R.id.password);
        inputAge = (EditText) findViewById(R.id.age);
        inputHeight = (EditText) findViewById(R.id.height);
        inputWeight = (EditText) findViewById(R.id.weight);
        GenderGroup = (RadioGroup) findViewById(R.id.radioGroup1);
        ProgramGroup = (RadioGroup) findViewById(R.id.radioGroup2);
        TrainerGroup = (RadioGroup) findViewById(R.id.radioGroup3);
        btnRegister = (Button) findViewById(R.id.btnRegister);
        btnLinkToLogin = (Button) findViewById(R.id.btnLinkToLoginScreen);


        // Progress dialog
        pDialog = new ProgressDialog(this);
        pDialog.setCancelable(false);

        // Session manager
        session = new SessionManager(getApplicationContext());

        // SQLite database handler
        db = new SQLiteHandler(getApplicationContext());
        // Check if user is already logged in or not
        if (session.isLoggedIn()) {
            // User is already logged in. Take him to main activity
            Intent intent = new Intent(RegisterActivity.this,
                    MainActivity.class);
            startActivity(intent);
            finish();
        }

        // Register Button Click event
        btnRegister.setOnClickListener(new View.OnClickListener() {
            public void onClick(View view) {
                String name = inputFullName.getText().toString().trim();
                String username = inputUsername.getText().toString().trim();
                String password = inputPassword.getText().toString().trim();
                String agestr= inputAge.getText().toString();
                String weightstr=inputWeight.getText().toString();
                String heightstr= inputHeight.getText().toString();
                int genderid = GenderGroup.getCheckedRadioButtonId();
                RadioButton genderbutton = (RadioButton) findViewById(genderid);
                String gender = genderbutton.getText().toString().trim();
                int programid = ProgramGroup.getCheckedRadioButtonId();
                String Programid="";
                switch(programid){
                    case R.id.radioButton_prog1:
                        Programid="1";
                        break;
                    case R.id.radioButton_prog2:
                        Programid="2";
                        break;
                }
                int trainerid = TrainerGroup.getCheckedRadioButtonId();
                String Trainerid="";
                switch(trainerid){
                    case R.id.radioButton_tra1:
                        Trainerid="1";
                        break;
                    case R.id.radioButton_tra2:
                        Trainerid="2";
                        break;
                }
                if (!name.isEmpty() && !username.isEmpty() && !password.isEmpty() && !agestr.isEmpty() && !weightstr.isEmpty() && !heightstr.isEmpty() && !gender.isEmpty() && !Programid.isEmpty() && !Trainerid.isEmpty())
                {
                    registerUser(name, username, password, agestr, weightstr, heightstr, gender, Programid, Trainerid);
                }
                else {
                    Toast.makeText(getApplicationContext(),
                            "Please enter your details!", Toast.LENGTH_LONG)
                            .show();
                }
            }
        });

        // Link to Login Screen
        btnLinkToLogin.setOnClickListener(new View.OnClickListener() {

            public void onClick(View view) {
                Intent i = new Intent(getApplicationContext(),
                        LoginActivity.class);
                startActivity(i);
                finish();
            }
        });

    }

    /**
     * Function to store user in MySQL database will post params(tag, name,
     * email, password) to register url
     * */
    private void registerUser(final String name, final String username,
                              final String password, final String age, final String weight, final String height, final String gender, final String Programid, final String Trainerid ) {
        // Tag used to cancel the request
        String tag_string_req = "req_register";

        pDialog.setMessage("Registering ...");
        showDialog();

        StringRequest strReq = new StringRequest(Method.POST,
                AppConfig.URL_REGISTER, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.d(TAG, "Register Response: " + response.toString());
                hideDialog();

                try {
                    JSONObject jObj = new JSONObject(response);
                    boolean error = jObj.getBoolean("error");
                    if (!error) {
                        // User successfully stored in MySQL
                        // Now store the user in sqlite
                        JSONObject user = jObj.getJSONObject("user");
                        String name = user.getString("name");
                        String username = user.getString("username");

                        // Inserting row in users table
                        db.addUser(name, username);

                        Toast.makeText(getApplicationContext(), "User successfully registered. Try login now!", Toast.LENGTH_LONG).show();

                        // Launch login activity
                        Intent intent = new Intent(
                                RegisterActivity.this,
                                LoginActivity.class);
                        startActivity(intent);
                        finish();
                    } else {

                        // Error occurred in registration. Get the error
                        // message
                        String errorMsg = jObj.getString("error_msg");
                        Toast.makeText(getApplicationContext(),
                                errorMsg, Toast.LENGTH_LONG).show();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Registration Error: " + error.getMessage());
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();
                hideDialog();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // Posting params to register url
                Map<String, String> params = new HashMap<String, String>();
                params.put("name", name);
                params.put("username", username);
                params.put("password", password);
                params.put("age", age);
                params.put("gender", gender);
                params.put("weight", weight);
                params.put("height", height);
                params.put("trainer_id", Trainerid);
                params.put("program_id", Programid);
                return params;
            }

        };

        // Adding request to request queue
        AppController.getInstance().addToRequestQueue(strReq, tag_string_req);
    }

    private void showDialog() {
        if (!pDialog.isShowing())
            pDialog.show();
    }

    private void hideDialog() {
        if (pDialog.isShowing())
            pDialog.dismiss();
    }
}