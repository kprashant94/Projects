package com.example.prashantkumar.resumemaker;

import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.parse.FindCallback;
import com.parse.GetCallback;
import com.parse.Parse;
import com.parse.ParseObject;
import com.parse.ParseQuery;

import java.text.ParseException;
import java.util.List;


public class pdfviewer extends ActionBarActivity {

    private TextView textout;
    private Button generate;
    private String descriptions;





    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pdfviewer);

        Parse.initialize(this, "Y3eTK7ANkaDr8uJqbTGX8XRSvGnmm1SeambgX2Qb", "wg8DO3sGfW2mUjNQFNLvnPeItkz2S3aaOxIdL6Iv");



        ParseQuery<ParseObject> query = ParseQuery.getQuery("PersonelInformation");
        query.whereEqualTo("Phone","8564931538");
        query.findInBackground(new FindCallback<ParseObject>() {
            @Override
            public void done(List<ParseObject> parseObjects, com.parse.ParseException e) {

                if(e == null){

                    for(int i = 0 ; i < parseObjects.size(); i++){

                        ParseObject p = parseObjects.get(i);
                        descriptions = p.getString("Name");
                    }
                }
            }
        });



        generate = (Button)findViewById(R.id.button1);

        generate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                textout = (TextView) findViewById(R.id.test);
                textout.setText(descriptions);
            }
        });





    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_pdfviewer, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
