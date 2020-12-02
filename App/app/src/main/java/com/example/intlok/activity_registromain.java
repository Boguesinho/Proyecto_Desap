package com.example.intlok;

import android.os.Bundle;
import android.transition.Explode;
import android.transition.Fade;
import android.transition.Slide;
import android.transition.Transition;
import android.view.Gravity;
import android.view.View;
import android.view.animation.DecelerateInterpolator;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

public class activity_registromain extends AppCompatActivity {
    EditText correo,usuario,password,passwordConfir;
    Button btnRegistrar;
    CheckBox terminos;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);


        Fade fadein= new Fade(Fade.IN);
        fadein.setDuration(activity_loginmain.DURATION_TRANSITION);
        fadein.setInterpolator(new DecelerateInterpolator());
        getWindow().setEnterTransition(fadein);



        setContentView(R.layout.activity_registro);

        correo=(EditText)findViewById(R.id.txtBlock_CorreoRegistro);
        usuario=(EditText)findViewById(R.id.txtBlock_UsuarioRegistro);
        password=(EditText)findViewById(R.id.txtBlock_PasswordRegistro);
        passwordConfir=(EditText)findViewById(R.id.txtBlock_Password2Registro);

        btnRegistrar=(Button)findViewById(R.id.btn_Registrar);

        terminos=(CheckBox)findViewById(R.id.checkBox_terminos);

        btnRegistrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(correo.getText().toString().isEmpty() && usuario.getText().toString().isEmpty() && password.getText().toString().isEmpty() && passwordConfir.getText().toString().isEmpty()){
                    Toast.makeText(activity_registromain.this, "Campos vacios", Toast.LENGTH_LONG).show();
                }
                else{
                    if(correo.getText().toString().isEmpty()||usuario.getText().toString().isEmpty()||password.getText().toString().isEmpty()||passwordConfir.getText().toString().isEmpty()){
                        Toast.makeText(activity_registromain.this, "Campos vacios", Toast.LENGTH_LONG).show();
                    }else{
                        if(!terminos.isChecked()){
                            Toast.makeText(activity_registromain.this, "Acepta Terminos y Condiciones", Toast.LENGTH_LONG).show();
                        }
                    }
                }
            }
        });

    }

    public void onBlackClicked(View view){
        finish();
    }


}
