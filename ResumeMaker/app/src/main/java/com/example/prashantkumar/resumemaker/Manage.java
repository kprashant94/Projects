package com.example.prashantkumar.resumemaker;

import android.app.AlertDialog;
import android.app.Dialog;
import android.content.ActivityNotFoundException;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.net.Uri;
import android.os.Environment;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.text.Layout;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.parse.DeleteCallback;
import com.parse.FindCallback;
import com.parse.Parse;
import com.parse.ParseObject;
import com.parse.ParseQuery;
import com.parse.ParseUser;

import java.io.File;
import java.io.FileOutputStream;
import java.util.List;


public class Manage extends ActionBarActivity {
    protected LinearLayout mnglayout;
    protected ListView list;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_manage);

        Parse.initialize(this, "Y3eTK7ANkaDr8uJqbTGX8XRSvGnmm1SeambgX2Qb", "wg8DO3sGfW2mUjNQFNLvnPeItkz2S3aaOxIdL6Iv");

        String path = Environment.getExternalStorageDirectory().getAbsolutePath() + "/PDF";


        list = (ListView)findViewById(R.id.managelist);
        Log.d("Files", "Path: " + path);
        File f = new File(path);
        File file[] = f.listFiles();
        final int textViewCount = file.length;

        String[] values = new String[file.length];
        for (int i = 0; i < file.length; ++i){
            values[i] = file[i].getName();
        }
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,
                android.R.layout.simple_list_item_1, android.R.id.text1, values);

        list.setAdapter(adapter);

        list.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> parent, View view,
                                    int position, long id) {
                int itemPosition     = position;
                String  itemValue    = (String) list.getItemAtPosition(position);

                openNewGameDialog(itemValue);

            }
        });


    }

    private void openNewGameDialog(final String filename)
    {
        new AlertDialog.Builder(this)
                .setTitle(R.string.new_game_title)
                .setItems(R.array.difficulty,
                        new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialoginterface, int i) {

                                if (i == 0) {
                                    Intent intent = new Intent(Manage.this, Information.class);
                                    String[] parts = filename.split("\\.");
                                    String part1 = parts[0];
                                    intent.putExtra("uid", part1);
                                    startActivity(intent);
                                }
                                if (i == 1) openPdf(filename);
                                if (i == 2) {
                                    String path = Environment.getExternalStorageDirectory().getAbsolutePath() + "/PDF";
                                    File pdffile = new File(path, filename);

                                    boolean deleted = pdffile.delete();

                                    Intent intent = getIntent();
                                    finish();
                                    startActivity(intent);
                                }
                                if (i == 3) {

                                    Intent emailIntent = new Intent(android.content.Intent.ACTION_SEND);
                                    emailIntent.setType("plain/text");


                                    String path = Environment.getExternalStorageDirectory().getAbsolutePath() + "/PDF";
                                    File pdffile = new File(path, filename);
                                    emailIntent.putExtra(Intent.EXTRA_STREAM, Uri.parse("file://" + pdffile));
                                    startActivity(emailIntent);
                                }

                            }
                        })
                .show();
    }

    void openPdf(String filename)
    {
        String path = Environment.getExternalStorageDirectory().getAbsolutePath() + "/PDF" ;
        File pdffile = new File(path , filename);

        if(pdffile.exists())
        {

            Uri Path = Uri.fromFile(pdffile);
            Intent pdfIntent = new Intent(Intent.ACTION_VIEW);
            pdfIntent.setDataAndType(Path, "application/pdf");
            pdfIntent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);


            try
            {

                startActivity(pdfIntent);
            }
            catch(ActivityNotFoundException e)
            {
                Toast.makeText(Manage.this,"Error",Toast.LENGTH_LONG).show();
            }
        }
    }




}
