package com.example.supplychainmanagement;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.Spinner;

public class AddNewCompanyActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {
    Button addCompanyBtn;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_new_company);
        addCompanyBtn = findViewById(R.id.addCompanyBtn);

        Spinner spinner = findViewById(R.id.stateField);
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,R.array.your_spinner_options_array,android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(this);
        addCompanyBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                EditText companyNameField = findViewById(R.id.companyNameField);
                EditText addressField = findViewById(R.id.addressField);
                EditText cityField = findViewById(R.id.cityField);
                EditText pincodeField = findViewById(R.id.pinCodeField);
                Spinner stateSelectMenu = findViewById(R.id.stateField);
                EditText gstNoField = findViewById(R.id.gstNoField);
                Spinner companyInSezField = findViewById(R.id.companyInSezField);
                Spinner companyTypeField = findViewById(R.id.companyTypeField);
                Spinner supplierTypeField = findViewById(R.id.supplierTypeField);
                EditText distanceFromAndheriField = findViewById(R.id.distanceFromAndheriField);
                EditText distanceFromVasaiField = findViewById(R.id.distanceFromVasaiField);
                String companyName = companyNameField.getText().toString();
                String address = addressField.getText().toString();
                String city = cityField.getText().toString();
                String pinCode = pincodeField.getText().toString();
                String state = stateSelectMenu.getSelectedItem().toString();
                String gstNo = gstNoField.getText().toString();
//                Boolean companyInSez = new Boolean(companyInSezField.getSelected);
                String comapanySize;
                String supplierType;
                Float distanceFromAndheri;
                Float distanceFromVasai;

            }
        });
    }

    @Override
    public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
        String text = adapterView.getItemAtPosition(i).toString();
        Toast.makeText(adapterView.getContext(), text ,Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }
}