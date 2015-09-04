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


public class Skills extends ActionBarActivity {

    protected EditText uskill1;
    protected EditText uskill2;
    protected EditText uskill3;
    protected Button nextActivity;
    protected Bundle extras;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_skills);

        extras = getIntent().getExtras();


        uskill1 = (EditText)findViewById(R.id.skill1);
        uskill2 = (EditText)findViewById(R.id.skill2);
        uskill3 = (EditText)findViewById(R.id.skill3);

        String objectid = extras.getString("uid");
        if(objectid!=null){

            ParseQuery<ParseObject> query = ParseQuery.getQuery("PersonelInformation");
            query.whereEqualTo("objectId", objectid);

            query.findInBackground(new FindCallback<ParseObject>() {
                @Override
                public void done(List<ParseObject> parseObjects, com.parse.ParseException e) {

                    if(e == null){
                        ParseObject p = parseObjects.get(0);
                        uskill1.setText(p.getString("Skill_1"));
                        uskill2.setText(p.getString("Skill_2"));
                        uskill3.setText(p.getString("Skill_3"));
                    }
                }
            });
        }

        nextActivity = (Button)findViewById(R.id.next3);
        nextActivity.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                String skill1 = uskill1.getText().toString().trim();
                String skill2 = uskill2.getText().toString().trim();
                String skill3 = uskill3.getText().toString().trim();
                String HighSchoolName2 = getIntent().getStringExtra("HighSchoolName");
                String HighSchoolMarks2 = getIntent().getStringExtra("HighSchoolMarks");
                String InterSchoolName2 = getIntent().getStringExtra("InterSchoolName");
                String InterSchoolMarks2 = getIntent().getStringExtra("InterSchoolMarks");
                String objective = getIntent().getStringExtra("objective");
                String name = getIntent().getStringExtra("name");
                String email = getIntent().getStringExtra("email");
                String phone = getIntent().getStringExtra("phone");
                String address = getIntent().getStringExtra("address");

                Intent intent = new Intent(Skills.this, Project1.class);
                String objectid = getIntent().getStringExtra("uid");
                intent.putExtra("uid", objectid);
                intent.putExtra("skill1", skill1);
                intent.putExtra("skill2", skill2);
                intent.putExtra("skill3", skill3);
                intent.putExtra("HighSchoolName", HighSchoolName2);
                intent.putExtra("HighSchoolMarks", HighSchoolMarks2);
                intent.putExtra("InterSchoolName", InterSchoolName2);
                intent.putExtra("InterSchoolMarks", InterSchoolMarks2);
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
