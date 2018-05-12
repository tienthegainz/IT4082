package com.example.vuduc.myapplication.activity;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.app.NavUtils;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.vuduc.myapplication.R;


import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.TimeZone;

public class TrackingActivity extends AppCompatActivity {

    boolean complete[] = new boolean[3];

    public class RowItemsTracking {
        String exercise;
        int weight;
        boolean checked;

        public RowItemsTracking(String exercise, int weight, boolean checked)
        {
            this.exercise = exercise;
            this.weight = weight;
            this.checked = checked;
        }

        public boolean isChecked(){
            return checked;
        }
    }

    static class ViewHolder {
        CheckBox checkBox;
        TextView exerciseView;
        TextView weightView;
    }

    public class ItemsListAdapter extends BaseAdapter {

        private Context context;
        private ArrayList<RowItemsTracking> list;

        ItemsListAdapter(Context c, ArrayList<RowItemsTracking> l) {
            context = c;
            list = l;
        }

        @Override
        public int getCount() {
            return list.size();
        }

        @Override
        public Object getItem(int position) {
            return list.get(position);
        }

        @Override
        public long getItemId(int position) {
            return position;
        }

        public boolean isChecked(int position) {
            return list.get(position).checked;
        }

        @Override
        public View getView(final int position, View convertView, ViewGroup parent) {
            View rowView = convertView;

            // reuse views
            ViewHolder viewHolder = new ViewHolder();
            LayoutInflater mInflater = (LayoutInflater) context.getSystemService(Activity.LAYOUT_INFLATER_SERVICE);
            if (rowView == null) {
                rowView = mInflater.inflate(R.layout.tracklist_layout, null);
                viewHolder.checkBox = rowView.findViewById(R.id.checkBox_tracking);
                viewHolder.exerciseView = rowView.findViewById(R.id.exercise_name_tracking);
                viewHolder.weightView = rowView.findViewById(R.id.weight_tracking);
                rowView.setTag(viewHolder);
            } else {
                viewHolder = (ViewHolder) rowView.getTag();
            }

            viewHolder.checkBox.setChecked(list.get(position).checked);

            final String exercise_name = list.get(position).exercise;
            viewHolder.exerciseView.setText(exercise_name);
            final int weight = list.get(position).weight;
            viewHolder.weightView.setText("Sets: 5  Reps: 5  Weight: " + weight);

            viewHolder.checkBox.setTag(position);

            viewHolder.checkBox.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    boolean newState = !list.get(position).isChecked();
                    list.get(position).checked = newState;
                    if(newState == true){
                        Toast.makeText(getApplicationContext(), exercise_name + " completed", Toast.LENGTH_SHORT).show();
                    }
                    else
                        Toast.makeText(getApplicationContext(), exercise_name + " not completed", Toast.LENGTH_SHORT).show();
                    complete[position] = newState;
                }
            });

            viewHolder.checkBox.setChecked(isChecked(position));

            return rowView;
        }
    }

    // test
    ArrayList<RowItemsTracking> rowItems;
    Bundle bundle;
    String[] exercise_name;
    int[] weight;
    ItemsListAdapter myItemsListAdapter;
    ListView trackList;
    Button saveButton;
    int lock = 0;
    //

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tracking);
        Toolbar toolbar = findViewById(R.id.toolbar);
        toolbar.setTitle("Daily tracking");
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        trackList = findViewById(R.id.trackingList);
        saveButton = findViewById(R.id.saveButton);

        // test
        bundle = this.getIntent().getExtras();
        exercise_name = bundle.getStringArray("exercise_name_array");
        weight = bundle.getIntArray("weight_array");
        final String username = bundle.getString("username");
        Calendar cal = Calendar.getInstance();
        int day = cal.get(Calendar.DAY_OF_MONTH);
        rowItems = new ArrayList<RowItemsTracking>();
        RowItemsTracking item;
        if(day % 2 == 1){
            item = new RowItemsTracking(exercise_name[0], weight[0], false);
            rowItems.add(item);
            item = new RowItemsTracking(exercise_name[1], weight[1], false);
            rowItems.add(item);
            item = new RowItemsTracking(exercise_name[2], weight[2], false);
            rowItems.add(item);
        }
        else {
            item = new RowItemsTracking(exercise_name[0], weight[0], false);
            rowItems.add(item);
            item = new RowItemsTracking(exercise_name[3], weight[3], false);
            rowItems.add(item);
            item = new RowItemsTracking(exercise_name[4], weight[4], false);
            rowItems.add(item);
        }

        myItemsListAdapter = new ItemsListAdapter(this, rowItems);
        trackList.setAdapter(myItemsListAdapter);

        saveButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(final View view) {
                // send data to webservice //
                // replace default with current username
                String URL = "http://hedspi-strength.000webhostapp.com/app/store_tracking.php";
                for(int i = 0; i < 3; i ++){
                    final int j = i;
                    StringRequest trackingRequest = new StringRequest(Request.Method.POST, URL,
                            new Response.Listener<String>()
                            {
                                @Override
                                public void onResponse(String response){
                                    Log.i("VOLLEY", response);
                                    lock ++;
                                    if(lock == 3){
                                        Toast toast = Toast.makeText(getApplicationContext(), "Saved", Toast.LENGTH_SHORT);
                                        toast.show();
                                        Intent intent = new Intent(TrackingActivity.this, MainActivity.class);
                                        startActivity(intent);
                                    }
                                }
                            },
                            new Response.ErrorListener()
                            {
                                @Override
                                public void onErrorResponse(VolleyError error){
                                    Log.i("VOLLEY", error.toString());
                                }
                            })
                    {
                        @Override
                        protected Map<String, String> getParams()
                        {
                            Map<String, String> params = new HashMap<String, String>();
                            // replace with current user //
                            params.put("username", username);
                            params.put("exercise", rowItems.get(j).exercise);
                            SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
                            sdf.setTimeZone(TimeZone.getDefault());
                            String currentDateandTime = sdf.format(new Date());
                            params.put("date", currentDateandTime);
                            if(complete[j] == true)
                                params.put("nosets", "5");
                            else params.put("nosets", "1");
                            params.put("weight", String.valueOf(rowItems.get(j).weight));
                            return params;
                        }
                    };

                    MySingleton.getInstance(getApplicationContext()).addToRequestQueue(trackingRequest);
                }
                //

            }
        });
        //
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            // Respond to the action bar's Up/Home button
            case android.R.id.home:
                NavUtils.navigateUpFromSameTask(this);
                return true;
        }
        return super.onOptionsItemSelected(item);
    }


}
