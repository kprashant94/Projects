package com.example.prashantkumar.resumemaker;

import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.parse.FindCallback;
import com.parse.Parse;
import com.parse.ParseException;
import com.parse.ParseObject;
import com.parse.ParseQuery;
import com.parse.SaveCallback;

import java.util.List;


public class Information extends ActionBarActivity {

    protected EditText uname;
    protected EditText uemail;
    protected EditText uphone;
    protected  EditText uaddress;
    protected EditText test;
    protected Button savebutton;
    protected Button nextActivity;
    protected  Button mngResumeButton;
    protected Bundle extras;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_information);


        extras = getIntent().getExtras();

        Parse.initialize(this, "Y3eTK7ANkaDr8uJqbTGX8XRSvGnmm1SeambgX2Qb", "wg8DO3sGfW2mUjNQFNLvnPeItkz2S3aaOxIdL6Iv");

        uname = (EditText) findViewById(R.id.name);
        uemail = (EditText) findViewById(R.id.email);
        uphone = (EditText) findViewById(R.id.phone);
        uaddress = (EditText) findViewById(R.id.address);
        nextActivity = (Button) findViewById(R.id.next1);

        String objectid = getIntent().getStringExtra("uid");
        if(objectid!=null){

            ParseQuery<ParseObject> query = ParseQuery.getQuery("PersonelInformation");
            query.whereEqualTo("objectId", objectid);

            query.findInBackground(new FindCallback<ParseObject>() {
                @Override
                public void done(List<ParseObject> parseObjects, com.parse.ParseException e) {

                    if(e == null){
                        ParseObject p = parseObjects.get(0);
                        uemail.setText(p.getString("Email"));
                        uname.setText(p.getString("Name"));
                        uphone.setText(p.getString("Phone"));
                        uaddress.setText(p.getString("Address"));
                    }
                }
            });
        }
        nextActivity.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                String name = uname.getText().toString().trim();
                String email = uemail.getText().toString().trim();
                String phone = uphone.getText().toString().trim();
                String address = uaddress.getText().toString().trim();

                Intent intent = new Intent(Information.this, Objective.class);

                String objectid = getIntent().getStringExtra("uid");
                intent.putExtra("uid", objectid);
                intent.putExtra("name", name);
                intent.putExtra("email", email);
                intent.putExtra("phone", phone);
                intent.putExtra("address", address);
                startActivity(intent);
            }

/*

                final ParseObject personelInformation = new ParseObject("PersonelInformation");

                personelInformation.put("Name", name);
                personelInformation.put("Email", email);
                personelInformation.put("Phone", phone);



                personelInformation.saveInBackground(new SaveCallback() {
                    @Override
                    public void done(ParseException e) {


                        if(e == null){

                            Intent intent = new Intent(Information.this, Profile.class);
                            String obid = personelInformation.getObjectId();
                            intent.putExtra("uid",obid);

                            startActivity(intent);
                            Toast.makeText(Information.this,"Saved",Toast.LENGTH_LONG).show();
                        }
                        else{

                            Toast.makeText(Information.this,"Error in Saving",Toast.LENGTH_LONG).show();
                        }
                    }
                });

            }
        });
*/
   /*     nextActivity = (Button)findViewById(R.id.next1);

        nextActivity.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                startActivity(new Intent(Information.this, EduInfo.class));
            }
        });

        mngResumeButton = (Button)findViewById(R.id.ResumeButton);
        mngResumeButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                startActivity(new Intent(Information.this, Manage.class));
            }
        });
*/
        });

    }




}
