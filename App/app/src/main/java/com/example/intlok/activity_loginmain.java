package com.example.intlok;

import android.app.VoiceInteractor;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.snackbar.Snackbar;

public class activity_loginmain extends AppCompatActivity {
    EditText usuario,password;
    Button btningresar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        usuario=(EditText)findViewById(R.id.editText_usuarioLogin);
        password=(EditText)findViewById(R.id.editText_Password);

        btningresar=(Button)findViewById(R.id.btn_IngresarLogin);

        btningresar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(usuario.getText().toString().isEmpty() && password.getText().toString().isEmpty()){
                    Toast.makeText(activity_loginmain.this, "Campos vacios", Toast.LENGTH_LONG).show();
                }
                else{
                    if(usuario.getText().toString().isEmpty()){
                        Toast.makeText(activity_loginmain.this, "Campo usuario vacio", Toast.LENGTH_LONG).show();
                    }
                    if(password.getText().toString().isEmpty()){
                        Toast.makeText(activity_loginmain.this, "Campo contraseña vacio", Toast.LENGTH_LONG).show();
                    }
                }
            }
        });

        }

}
