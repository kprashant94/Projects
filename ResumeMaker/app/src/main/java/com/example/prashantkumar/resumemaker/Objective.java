package com.example.prashantkumar.resumemaker;

import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.parse.FindCallback;
import com.parse.ParseObject;
import com.parse.ParseQuery;

import java.util.List;


public class Objective extends ActionBarActivity {

    protected EditText uobjective;
    protected Button nextActivity;
    protected  Bundle extras;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_objective);

        extras = getIntent().getExtras();
        String objectid = extras.getString("uid");
        if(objectid!=null){

            ParseQuery<ParseObject> query = ParseQuery.getQuery("PersonelInformation");
            query.whereEqualTo("objectId", objectid);

            query.findInBackground(new FindCallback<ParseObject>() {
                @Override
                public void done(List<ParseObject> parseObjects, com.parse.ParseException e) {

                    if(e == null){
                        ParseObject p = parseObjects.get(0);
                        uobjective.setText(p.getString("Objective"));
                    }
                }
            });
        }
        uobjective = (EditText)findViewById(R.id.objective);
        nextActivity = (Button)findViewById(R.id.next0);
        nextActivity.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String objective = uobjective.getText().toString().trim();
                String name = getIntent().getStringExtra("name");
                String email = getIntent().getStringExtra("email");
                String phone = getIntent().getStringExtra("phone");
                String address = getIntent().getStringExtra("address");
                Intent intent = new Intent(Objective.this, EduInfo.class);
                String objectid = getIntent().getStringExtra("uid");
                intent.putExtra("uid", objectid);
                intent.putExtra("objective", objective);
                intent.putExtra("name", name);
                intent.putExtra("email", email);
                intent.putExtra("phone", phone);
                intent.putExtra("address", address);
                startActivity(intent);
            }
        });
    }





}
