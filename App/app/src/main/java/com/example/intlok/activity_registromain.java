package com.example.intlok;

import android.content.Intent;
import android.os.Bundle;
import android.transition.Explode;
import android.transition.Fade;
import android.transition.Slide;
import android.transition.Transition;
import android.util.Log;
import android.view.Gravity;
import android.view.View;
import android.view.animation.DecelerateInterpolator;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityOptionsCompat;

import com.example.intlok.api.ApiClient;
import com.example.intlok.models.LoginRequest;
import com.example.intlok.models.LoginResponse;
import com.example.intlok.models.RegisterUserRequest;
import com.example.intlok.models.RegisterUserResponse;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class activity_registromain extends AppCompatActivity {
    EditText usuario,password,passwordConfir;
    Button btnRegistrar;

    public static final long DURATION_TRANSITION=1000;
    boolean band;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);


        Fade fadein= new Fade(Fade.IN);
        fadein.setDuration(activity_loginmain.DURATION_TRANSITION);
        fadein.setInterpolator(new DecelerateInterpolator());
        getWindow().setEnterTransition(fadein);



        setContentView(R.layout.activity_registro);

        //correo=(EditText)findViewById(R.id.txtBlock_CorreoRegistro);
        usuario=(EditText)findViewById(R.id.txtBlock_UsuarioRegistro);
        password=(EditText)findViewById(R.id.txtBlock_PasswordRegistro);
        passwordConfir=(EditText)findViewById(R.id.txtBlock_Password2Registro);

        btnRegistrar=(Button)findViewById(R.id.btn_ContinuarRegistro);

        //terminos=(CheckBox)findViewById(R.id.checkBox_terminos);

        btnRegistrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(usuario.getText().toString().isEmpty() && password.getText().toString().isEmpty() && passwordConfir.getText().toString().isEmpty()){
                    Toast.makeText(activity_registromain.this, "Campos vacios", Toast.LENGTH_LONG).show();
                    return;
                }
                else{
                    if(usuario.getText().toString().isEmpty()||password.getText().toString().isEmpty()||passwordConfir.getText().toString().isEmpty()){
                        Toast.makeText(activity_registromain.this, "Campos vacios", Toast.LENGTH_LONG).show(); return;
                    }

                    createUser(v);
                }
            }
        });

    }

    public void createUser(View v){
        RegisterUserRequest registerUserRequest = new RegisterUserRequest();
        registerUserRequest.setUsername(usuario.getText().toString());
        registerUserRequest.setPassword(password.getText().toString());

        Call<RegisterUserResponse> registerUserResponseCall = ApiClient.getUserService().createUser(registerUserRequest);
        registerUserResponseCall.enqueue(new Callback<RegisterUserResponse>() {
            @Override
            public void onResponse(Call<RegisterUserResponse> call, Response<RegisterUserResponse> response) {
                int idUsuario=response.body().getUser().getId();
                Log.println(idUsuario,"STATE","registro");
                String token= response.body().getToken();
                onFadeClicked(v,idUsuario,token);
                //checkLogin(v,idUsuario);
            }

            @Override
            public void onFailure(Call<RegisterUserResponse> call, Throwable t) {
                Toast.makeText(activity_registromain.this, "No se pudo crear el usuario", Toast.LENGTH_LONG).show();
            }
        });

    }

    public void checkLogin(View v, int idUsuario){
        LoginRequest loginRequest = new LoginRequest();
        loginRequest.setUsername(usuario.getText().toString());
        loginRequest.setPassword(password.getText().toString());

        Call<LoginResponse> loginResponseCall = ApiClient.getUserService().userlogin(loginRequest);
        loginResponseCall.enqueue(new Callback<LoginResponse>() {
            @Override
            public void onResponse(Call<LoginResponse> call, Response<LoginResponse> response) {
                if(response.isSuccessful()){
                    Toast.makeText(activity_registromain.this, "Exito", Toast.LENGTH_LONG).show();
                    String token = response.body().getToken();
                    onFadeClicked(v,idUsuario,token);
                }else{

                    Toast.makeText(activity_registromain.this, "Usuario no encontrado", Toast.LENGTH_LONG).show();
                }
            }

            @Override
            public void onFailure(Call<LoginResponse> call, Throwable t) {

                Toast.makeText(activity_registromain.this, "Throwable", Toast.LENGTH_LONG).show();
            }
        });
    }

    private Transition transition;

    public void onExplodeClicked(View view,int idUsuario,String token){
        transition= new Explode();
        iniciarActividadSecuandaria(idUsuario,token);
    }

    public void onSlideClicked(View view,int idUsuario,String token){
        transition= new Slide(Gravity.START);
        iniciarActividadSecuandaria(idUsuario,token);
    }

    public void onFadeClicked(View view,int idUsuario,String token){
        transition= new Fade(Fade.OUT);
        iniciarActividadSecuandaria(idUsuario,token);
    }

    public void iniciarActividadSecuandaria(int idUsuario,String token){

        transition.setDuration(DURATION_TRANSITION);
        transition.setInterpolator(new DecelerateInterpolator());

        getWindow().setExitTransition(transition);


        Intent siguiente = new Intent(this, activity_registrocontinuacion.class);
        siguiente.putExtra("idUsuario", idUsuario);
        siguiente.putExtra("token",token);
        startActivity(siguiente, ActivityOptionsCompat
                .makeSceneTransitionAnimation(this).toBundle());
    }

    public void onBlackClicked(View view){
        finish();
    }


}
