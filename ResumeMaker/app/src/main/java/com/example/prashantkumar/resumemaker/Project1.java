package com.example.prashantkumar.resumemaker;

import android.content.Intent;
import android.os.Environment;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.itextpdf.text.BaseColor;
import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Element;
import com.itextpdf.text.Font;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.Phrase;
import com.itextpdf.text.Rectangle;
import com.itextpdf.text.pdf.PdfPCell;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;
import com.parse.FindCallback;
import com.parse.GetCallback;
import com.parse.Parse;
import com.parse.ParseException;
import com.parse.ParseObject;
import com.parse.ParseQuery;
import com.parse.SaveCallback;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.List;


public class Project1 extends ActionBarActivity {

    protected EditText uproject1title;
    protected EditText uproject1details;
    protected EditText uproject2title;
    protected EditText uproject2details;
    protected Button saveButton;
    protected  Bundle extras;

    protected String project1title ;
    protected String project1details ;
    protected String project2title ;
    protected String project2details ;

    protected String name ;
    protected String email ;
    protected String phone ;
    protected String address  ;
    protected String objective ;


    protected String HighSchoolName ;
    protected String HighSchoolMarks ;
    protected String InterSchoolName ;
    protected String InterSchoolMarks ;

    protected String skill1 ;
    protected String skill2 ;
    protected String skill3 ;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_project1);

        extras = getIntent().getExtras();

        Parse.initialize(this, "Y3eTK7ANkaDr8uJqbTGX8XRSvGnmm1SeambgX2Qb", "wg8DO3sGfW2mUjNQFNLvnPeItkz2S3aaOxIdL6Iv");

        uproject1title = (EditText)findViewById(R.id.project1title);
        uproject1details = (EditText)findViewById(R.id.project1details);
        uproject2title = (EditText)findViewById(R.id.project2title);
        uproject2details = (EditText)findViewById(R.id.project2details);


        String objectid = extras.getString("uid");
        if(objectid!=null){

            ParseQuery<ParseObject> query = ParseQuery.getQuery("PersonelInformation");
            query.whereEqualTo("objectId", objectid);

            query.findInBackground(new FindCallback<ParseObject>() {
                @Override
                public void done(List<ParseObject> parseObjects, com.parse.ParseException e) {

                    if(e == null){
                        ParseObject p = parseObjects.get(0);
                        uproject1title.setText(p.getString("ProjectTitle1"));
                        uproject2title.setText(p.getString("ProjectTitle2"));
                        uproject1details.setText(p.getString("ProjectDetails1"));
                        uproject2details.setText(p.getString("ProjectDetails2"));
                    }
                }
            });
        }

        saveButton = (Button)findViewById(R.id.save);

        saveButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                project1title = uproject1title.getText().toString().trim();
                project1details = uproject1details.getText().toString().trim();
                project2title = uproject2title.getText().toString().trim();
                project2details = uproject2details.getText().toString().trim();

                name = getIntent().getStringExtra("name");
                email = getIntent().getStringExtra("email");
                phone = getIntent().getStringExtra("phone");
                address = getIntent().getStringExtra("address");
                objective = getIntent().getStringExtra("objective");


                HighSchoolName = getIntent().getStringExtra("HighSchoolName");
                HighSchoolMarks = getIntent().getStringExtra("HighSchoolMarks");
                InterSchoolName = getIntent().getStringExtra("InterSchoolName");
                InterSchoolMarks = getIntent().getStringExtra("InterSchoolMarks");

                skill1 = extras.getString("skill1");
                skill2 = extras.getString("skill2");
                skill3 = extras.getString("skill3");

                String objectid = extras.getString("uid");
                if (objectid != null) {
                    ParseQuery<ParseObject> query = ParseQuery.getQuery("PersonelInformation");
                    query.getInBackground(objectid, new GetCallback<ParseObject>() {
                        public void done(final ParseObject personelInformation, ParseException e) {
                            if (e == null) {

                                personelInformation.put("Name", name);
                                personelInformation.put("Email", email);
                                personelInformation.put("Phone", phone);
                                personelInformation.put("Address", address);
                                personelInformation.put("Objective", objective);

                                personelInformation.put("HighSchoolName", HighSchoolName);
                                personelInformation.put("HighSchoolMarks", HighSchoolMarks);
                                personelInformation.put("InterSchoolName", InterSchoolName);
                                personelInformation.put("InterSchoolMarks", InterSchoolMarks);

                                personelInformation.put("Skill_1", skill1);
                                personelInformation.put("Skill_2", skill2);
                                personelInformation.put("Skill_3", skill3);
                                personelInformation.put("ProjectTitle1",  project1title);
                                personelInformation.put("ProjectDetails1", project1details);
                                personelInformation.put("ProjectTitle2", project2title);
                                personelInformation.put("ProjectDetails2", project2details);

                                personelInformation.saveInBackground(new SaveCallback() {
                                    @Override
                                    public void done(ParseException e) {
                                        if (e == null) {

                                           // Toast.makeText(Project1.this, "Saved", Toast.LENGTH_LONG).show();

                                            String obId = personelInformation.getObjectId();
                                            createPDF(obId);

                                            Intent intent = new Intent(Project1.this, Manage.class);
                                            startActivity(intent);

                                        }
                                        else {

                                            Toast.makeText(Project1.this, "Error in Saving", Toast.LENGTH_LONG).show();
                                        }
                                    }
                                });
                            }
                        }
                    });
                }
                else {
                    final ParseObject personelInformation = new ParseObject("PersonelInformation");

                    personelInformation.put("Name", name);
                    personelInformation.put("Email", email);
                    personelInformation.put("Phone", phone);
                    personelInformation.put("Address", address);
                    personelInformation.put("Objective", objective);

                    personelInformation.put("HighSchoolName", HighSchoolName);
                    personelInformation.put("HighSchoolMarks", HighSchoolMarks);
                    personelInformation.put("InterSchoolName", InterSchoolName);
                    personelInformation.put("InterSchoolMarks", InterSchoolMarks);

                    personelInformation.put("Skill_1", skill1);
                    personelInformation.put("Skill_2", skill2);
                    personelInformation.put("Skill_3", skill3);
                    personelInformation.put("ProjectTitle1", project1title);
                    personelInformation.put("ProjectDetails1", project1details);
                    personelInformation.put("ProjectTitle2", project2title);
                    personelInformation.put("ProjectDetails2", project2details);
                    personelInformation.saveInBackground(new SaveCallback() {
                        @Override
                        public void done(ParseException e) {
                            if (e == null) {

                                //Toast.makeText(Project1.this, "Saved", Toast.LENGTH_LONG).show();

                                String obId = personelInformation.getObjectId();
                                createPDF(obId);

                                Intent intent = new Intent(Project1.this, Manage.class);
                                startActivity(intent);

                            }
                            else {

                                Toast.makeText(Project1.this, "Error in Saving", Toast.LENGTH_LONG).show();
                            }
                        }
                    });
                }
            }
        });

    }


    public void createPDF(String objectid)
    {
        Document doc = new Document();

        try {
            String path = Environment.getExternalStorageDirectory().getAbsolutePath() + "/PDF";

            File PDF = new File(path);
            if(!PDF.exists())
                PDF.mkdirs();


            Log.d("PDFCreator", "PDF Path: " + path);

            String tempfname = objectid + ".pdf";//extras.getString("uid2")+".pdf";
            File file = new File(PDF, tempfname);
            FileOutputStream fOut = new FileOutputStream(file);

            PdfWriter.getInstance(doc, fOut);

            Font font1 = new Font(Font.FontFamily.HELVETICA,20,Font.BOLD);
            Font font2 = new Font(Font.FontFamily.HELVETICA,14,Font.ITALIC);
            Font font3 = new Font(Font.FontFamily.HELVETICA,14);
            Font font4 = new Font(Font.FontFamily.HELVETICA,3);
            Font font5 = new Font(Font.FontFamily.HELVETICA,10);
            Font font6 = new Font(Font.FontFamily.HELVETICA,12,Font.BOLD);
            doc.open();

            Paragraph p1 = new Paragraph(name,font1);
            p1.setAlignment(Paragraph.ALIGN_CENTER);
            doc.add(p1);

            Paragraph p2 = new Paragraph(email,font2);
            p2.setAlignment(Paragraph.ALIGN_CENTER);
            doc.add(p2);

            Paragraph p3 = new Paragraph(phone,font3);
            p3.setAlignment(Paragraph.ALIGN_CENTER);
            doc.add(p3);

            p3 = new Paragraph(address,font5);
            p3.setAlignment(Paragraph.ALIGN_CENTER);
            doc.add(p3);

            PdfPTable table1 = new PdfPTable(1);
            table1.setWidthPercentage(100);
            table1.setSpacingBefore(10f);
            PdfPCell cell1 = new PdfPCell(new Phrase(" ",font4));
            cell1.setBackgroundColor(BaseColor.BLUE);
            cell1.setBorder(Rectangle.NO_BORDER);
            table1.addCell(cell1);
            doc.add(table1);

            Paragraph p4 = new Paragraph("Objective",font3);
            p4.setAlignment(Paragraph.ALIGN_LEFT);
            doc.add(p4);

            Paragraph p5 = new Paragraph(objective,font5);
            p5.setAlignment(Paragraph.ALIGN_LEFT);
            p5.setIndentationLeft(25);
            doc.add(p5);

            PdfPTable table2 = new PdfPTable(1);
            table2.setWidthPercentage(100);
            table2.setSpacingBefore(10f);
            PdfPCell cell2 = new PdfPCell(new Phrase(" ",font4));
            cell2.setBackgroundColor(BaseColor.BLUE);
            cell2.setBorder(Rectangle.NO_BORDER);
            table2.addCell(cell2);
            doc.add(table2);

            Paragraph p6 = new Paragraph("Education Qualifications",font3);
            p6.setAlignment(Paragraph.ALIGN_LEFT);
            doc.add(p6);

            PdfPTable table3 = new PdfPTable(3);
            table3.setWidthPercentage(100);
            table3.setSpacingBefore(10f);
            table3.setSpacingAfter(10f);
            PdfPCell cell31 = new PdfPCell(new Paragraph("Degree/Board",font5));
            PdfPCell cell32 = new PdfPCell(new Paragraph("Institute",font5));
            PdfPCell cell33 = new PdfPCell(new Paragraph("Performance",font5));
            PdfPCell cell34 = new PdfPCell(new Paragraph("High School",font5));
            PdfPCell cell35 = new PdfPCell(new Phrase(HighSchoolName,font5));
            PdfPCell cell36 = new PdfPCell(new Phrase(HighSchoolMarks,font5));
            PdfPCell cell37 = new PdfPCell(new Phrase("Intermediate",font5));
            PdfPCell cell38 = new PdfPCell(new Phrase(InterSchoolName,font5));
            PdfPCell cell39 = new PdfPCell(new Phrase(InterSchoolMarks,font5));

            cell31.setHorizontalAlignment(Element.ALIGN_CENTER);
            cell32.setHorizontalAlignment(Element.ALIGN_CENTER);
            cell33.setHorizontalAlignment(Element.ALIGN_CENTER);
            cell34.setHorizontalAlignment(Element.ALIGN_CENTER);
            cell35.setHorizontalAlignment(Element.ALIGN_CENTER);
            cell36.setHorizontalAlignment(Element.ALIGN_CENTER);
            cell37.setHorizontalAlignment(Element.ALIGN_CENTER);
            cell38.setHorizontalAlignment(Element.ALIGN_CENTER);
            cell39.setHorizontalAlignment(Element.ALIGN_CENTER);
            table3.addCell(cell31);
            table3.addCell(cell32);
            table3.addCell(cell33);
            table3.addCell(cell34);
            table3.addCell(cell35);
            table3.addCell(cell36);
            table3.addCell(cell37);
            table3.addCell(cell38);
            table3.addCell(cell39);
            doc.add(table3);

            PdfPTable table4 = new PdfPTable(1);
            table4.setWidthPercentage(100);
            table4.setSpacingBefore(10f);
            PdfPCell cell4 = new PdfPCell(new Phrase(" ",font4));
            cell4.setBackgroundColor(BaseColor.BLUE);
            cell4.setBorder(Rectangle.NO_BORDER);
            table4.addCell(cell4);
            doc.add(table4);

            Paragraph p7 = new Paragraph("Projects",font3);
            p7.setAlignment(Paragraph.ALIGN_LEFT);
            doc.add(p7);

            Paragraph p8 = new Paragraph(project1title,font6);
            p8.setAlignment(Paragraph.ALIGN_LEFT);
            p8.setIndentationLeft(20);
            doc.add(p8);

            Paragraph p9 = new Paragraph(project1details,font5);
            p9.setAlignment(Paragraph.ALIGN_LEFT);
            p9.setIndentationLeft(35);
            doc.add(p9);

            Paragraph p10 = new Paragraph(project2title,font6);
            p10.setIndentationLeft(20);
            p10.setAlignment(Paragraph.ALIGN_LEFT);
            doc.add(p10);

            Paragraph p11 = new Paragraph(project2details,font5);
            p11.setAlignment(Paragraph.ALIGN_LEFT);
            p11.setIndentationLeft(35);
            doc.add(p11);

            PdfPTable table5 = new PdfPTable(1);
            table5.setWidthPercentage(100);
            table5.setSpacingBefore(10f);
            PdfPCell cell5 = new PdfPCell(new Phrase(" ",font4));
            cell5.setBackgroundColor(BaseColor.BLUE);
            cell5.setBorder(Rectangle.NO_BORDER);
            table5.addCell(cell5);
            doc.add(table5);

            Paragraph p12 = new Paragraph("Skills",font3);
            p12.setAlignment(Paragraph.ALIGN_LEFT);
            doc.add(p12);

            Paragraph p13 = new Paragraph(skill1,font5);
            p13.setAlignment(Paragraph.ALIGN_LEFT);
            p13.setIndentationLeft(20);
            doc.add(p13);

            Paragraph p14 = new Paragraph(skill2,font5);
            p14.setAlignment(Paragraph.ALIGN_LEFT);
            p14.setIndentationLeft(20);
            doc.add(p14);

            Paragraph p15 = new Paragraph(skill3,font5);
            p15.setIndentationLeft(20);
            p15.setAlignment(Paragraph.ALIGN_LEFT);
            doc.add(p15);

            PdfPTable table6 = new PdfPTable(1);
            table6.setWidthPercentage(100);
            table6.setSpacingBefore(10f);
            PdfPCell cell6 = new PdfPCell(new Phrase(" ",font4));
            cell6.setBackgroundColor(BaseColor.BLUE);
            cell6.setBorder(Rectangle.NO_BORDER);
            table6.addCell(cell6);
            doc.add(table6);

            Toast.makeText(getApplicationContext(), "Created...", Toast.LENGTH_LONG).show();

        }

        catch (DocumentException de) {
            Log.e("PDFCreator", "DocumentException:" + de);
        } catch (IOException e) {
            Log.e("PDFCreator", "ioException:" + e);
        }
        finally
        {
            doc.close();
        }
    }


}
