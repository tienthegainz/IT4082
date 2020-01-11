package com.example.vuduc.myapplication.activity;

import android.os.Bundle;
import android.support.v4.app.DialogFragment;
import android.support.v4.app.NavUtils;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.vuduc.myapplication.R;
import com.github.mikephil.charting.charts.LineChart;
import com.github.mikephil.charting.components.AxisBase;
import com.github.mikephil.charting.components.Legend;
import com.github.mikephil.charting.components.XAxis;
import com.github.mikephil.charting.components.YAxis;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;
import com.github.mikephil.charting.formatter.IAxisValueFormatter;
import com.github.mikephil.charting.interfaces.datasets.ILineDataSet;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class GraphActivity extends AppCompatActivity {

    int[] weight = new int[6];
    String[] date = new String[6];

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_graph);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);

        final Bundle bundle = this.getIntent().getExtras();
        final String exercise = bundle.getString("exercise");
        final String username = bundle.getString("username");

        toolbar.setTitle(exercise);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        final LineChart chart = (LineChart) findViewById(R.id.chart);

        String URL = "http://hedspi-strength.000webhostapp.com/app/get_last_6_days_result.php";

        StringRequest request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject json;
                try {
                    int number_of_actual_records = 0;
                    json = new JSONObject(response);
                    Boolean error = json.getBoolean("error");
                    if(!error) {
                        JSONObject jsondata = json.getJSONObject("day6");
                        String date_record = jsondata.getString("date");
                        int weight_record = jsondata.getInt("weight");
                        date[0] = date_record;
                        weight[0] = weight_record;

                        for(int i = 1; i < 6; i ++){
                            jsondata = json.getJSONObject("day" + (6 - i));
                            date_record = jsondata.getString("date");
                            weight_record = jsondata.getInt("weight");
                            if(!date_record.equals(date[number_of_actual_records]) || weight_record != weight[number_of_actual_records]){
                                date[number_of_actual_records + 1] = date_record;
                                weight[number_of_actual_records + 1] = weight_record;
                                number_of_actual_records ++;
                            }
                        }

                        List<Entry> entries = new ArrayList<Entry>();

                        for(int i = 0; i <= number_of_actual_records ; i ++) {
                            Entry e = new Entry(i, weight[i]);
                            entries.add(e);
                            date[i] = date[i].substring(5);
                        }

                        LineDataSet set = new LineDataSet(entries, "Weight in kilograms");
                        set.setAxisDependency(YAxis.AxisDependency.LEFT);
                        set.setColor(getResources().getColor(R.color.colorPrimary));
                        set.setCircleColor(getResources().getColor(R.color.colorPrimaryDark));
                        set.setLineWidth(1.2f);
                        set.setDrawValues(false);
                        set.setCircleRadius(5);

                        List<ILineDataSet> dataSets = new ArrayList<ILineDataSet>();
                        dataSets.add(set);

                        IAxisValueFormatter formatter = new IAxisValueFormatter() {

                            @Override
                            public String getFormattedValue(float value, AxisBase axis) {
                                return date[(int) value];
                            }

                        };

                        XAxis xAxis = chart.getXAxis();
                        xAxis.setGranularity(1f); // minimum axis-step (interval) is 1
                        xAxis.setTextSize(8f);
                        xAxis.setDrawGridLines(false);
                        xAxis.setValueFormatter(formatter);

                        chart.getAxisRight().setDrawAxisLine(false);
                        chart.getDescription().setEnabled(false);
                        chart.setExtraOffsets(10,15,10,0);

                        Legend legend = chart.getLegend();
                        legend.setYOffset(10);

                        LineData data = new LineData(dataSets);
                        chart.setData(data);

                        chart.invalidate(); // refresh
                    }
                    else {
                        String error_msg = json.getString("error_msg");
                        Bundle dialog_bundle = new Bundle();
                        dialog_bundle.putString("error_msg", error_msg);
                        DialogFragment dialog = new MyDialogFragment();
                        dialog.setArguments(dialog_bundle);
                        dialog.show(getSupportFragmentManager(), "MyDialogFragmentTag");
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("VOLLEY", error.toString());
            }
        }) {
            @Override
            protected Map<String,String> getParams(){
                Map<String,String> params = new HashMap<String, String>();
                // replace with current user //
                params.put("username", username);
                params.put("exercise", exercise);
                return params;
            }

            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                Map<String,String> params = new HashMap<String, String>();
                params.put("Content-Type","application/x-www-form-urlencoded");
                return params;
            }
        };

        MySingleton.getInstance(getApplicationContext()).addToRequestQueue(request);

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
