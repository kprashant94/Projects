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


public class EduInfo extends ActionBarActivity {

    protected EditText uHighSchoolName;
    protected EditText uHighSchoolMarks;
    protected EditText uInterSchoolName;
    protected EditText uInterSchoolMarks;
    protected  Bundle extras;


    protected Button nextActivity;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edu_info);

        extras = getIntent().getExtras();

        uHighSchoolName = (EditText)findViewById(R.id.highschoolname);
        uHighSchoolMarks = (EditText)findViewById(R.id.highschoolmarks);
        uInterSchoolName = (EditText)findViewById(R.id.Intermediateschoolname);
        uInterSchoolMarks = (EditText)findViewById(R.id.Intermediateschoolmarks);

        String objectid = extras.getString("uid");
        if(objectid!=null){

            ParseQuery<ParseObject> query = ParseQuery.getQuery("PersonelInformation");
            query.whereEqualTo("objectId", objectid);

            query.findInBackground(new FindCallback<ParseObject>() {
                @Override
                public void done(List<ParseObject> parseObjects, com.parse.ParseException e) {

                    if(e == null){
                        ParseObject p = parseObjects.get(0);
                        uHighSchoolName.setText(p.getString("HighSchoolName"));
                        uHighSchoolMarks.setText(p.getString("HighSchoolMarks"));
                        uInterSchoolName.setText(p.getString("InterSchoolName"));
                        uInterSchoolMarks.setText(p.getString("InterSchoolMarks"));
                    }
                }
            });
        }
        nextActivity = (Button)findViewById(R.id.next2);
       nextActivity.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View view) {

               String HighSchoolName = uHighSchoolName.getText().toString().trim();
               String HighSchoolMarks = uHighSchoolMarks.getText().toString().trim();
               String InterSchoolName = uInterSchoolName.getText().toString().trim();
               String InterSchoolMarks = uInterSchoolMarks.getText().toString().trim();
               String objective = getIntent().getStringExtra("objective");
               String name = getIntent().getStringExtra("name");
               String email = getIntent().getStringExtra("email");
               String phone = getIntent().getStringExtra("phone");
               String address = getIntent().getStringExtra("address");

               Intent intent = new Intent(EduInfo.this, Skills.class);
               String objectid = getIntent().getStringExtra("uid");
               intent.putExtra("uid", objectid);

               intent.putExtra("HighSchoolName", HighSchoolName);
               intent.putExtra("HighSchoolMarks", HighSchoolMarks);
               intent.putExtra("InterSchoolName", InterSchoolName);
               intent.putExtra("InterSchoolMarks", InterSchoolMarks);
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
