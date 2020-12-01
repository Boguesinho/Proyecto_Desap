package com.example.intlok;

import android.os.Bundle;
import android.view.View;
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
        setContentView(R.layout.activity_registro);

        correo=(EditText)findViewById(R.id.txtBlock_correo);
        usuario=(EditText)findViewById(R.id.txtBlock_usuario);
        password=(EditText)findViewById(R.id.txtBlock_password);
        passwordConfir=(EditText)findViewById(R.id.txtBlock_password2);

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

}
