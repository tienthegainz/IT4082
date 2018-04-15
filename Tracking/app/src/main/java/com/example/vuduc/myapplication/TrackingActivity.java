package com.example.vuduc.myapplication;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.NavUtils;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

public class TrackingActivity extends AppCompatActivity {

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
            viewHolder.weightView.setText("Set: 5  Reps: 5  Mức tạ: " + weight);

            viewHolder.checkBox.setTag(position);

            viewHolder.checkBox.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    boolean newState = !list.get(position).isChecked();
                    list.get(position).checked = newState;
                    Toast.makeText(getApplicationContext(),
                            exercise_name + " trạng thái: " + newState,
                            Toast.LENGTH_LONG).show();
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
    //

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tracking);
        Toolbar toolbar = findViewById(R.id.toolbar);
        toolbar.setTitle("Theo dõi hàng ngày");
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        trackList = findViewById(R.id.trackingList);
        saveButton = findViewById(R.id.saveButton);

        // test
        bundle = this.getIntent().getExtras();
        exercise_name = bundle.getStringArray("exercise_name_array");
        weight = bundle.getIntArray("weight_array");
        Calendar cal = Calendar.getInstance();
        int day = cal.get(Calendar.DAY_OF_MONTH);
        rowItems = new ArrayList<RowItemsTracking>();
        RowItemsTracking item;
        if(day % 2 == 1){
            item = new RowItemsTracking(exercise_name[1], weight[1], false);
            rowItems.add(item);
            item = new RowItemsTracking(exercise_name[2], weight[2], false);
            rowItems.add(item);
            item = new RowItemsTracking(exercise_name[3], weight[3], false);
            rowItems.add(item);
        }
        else {
            item = new RowItemsTracking(exercise_name[1], weight[1], false);
            rowItems.add(item);
            item = new RowItemsTracking(exercise_name[4], weight[4], false);
            rowItems.add(item);
            item = new RowItemsTracking(exercise_name[5], weight[5], false);
            rowItems.add(item);
        }

        myItemsListAdapter = new ItemsListAdapter(this, rowItems);
        trackList.setAdapter(myItemsListAdapter);

        saveButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // send data to webservice //

                //
                Toast toast = Toast.makeText(getApplicationContext(), "Đã lưu", Toast.LENGTH_SHORT);
                toast.show();
                Intent intent = new Intent(TrackingActivity.this, MainActivity.class);
                startActivity(intent);
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
