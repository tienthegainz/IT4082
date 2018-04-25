package com.example.vuduc.myapplication;

import android.app.Activity;
import android.content.Context;
import android.inputmethodservice.Keyboard;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.lang.reflect.Array;
import java.util.ArrayList;

/**
 * Created by vuduc on 4/14/2018.
 */

public class CustomAdapter extends BaseAdapter {
    Context context;
    ArrayList<RowItems> rowItems;

    CustomAdapter(Context context, ArrayList<RowItems> rowItems)
    {
        this.context = context;
        this.rowItems = rowItems;
    }

    @Override
    public int getCount() { return rowItems.size(); }

    @Override
    public Object getItem(int position) { return rowItems.get(position); }

    @Override
    public long getItemId(int position) {
        return rowItems.indexOf(getItem(position));
    }

    private class ViewHolder{
        TextView exercise_name;
        TextView weight;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup container) {
        ViewHolder holder;
        LayoutInflater mInflater = (LayoutInflater) context.getSystemService(Activity.LAYOUT_INFLATER_SERVICE);
        if (convertView == null) {
            convertView = mInflater.inflate(R.layout.listview_layout, null);
            holder = new ViewHolder();
            holder.exercise_name = convertView.findViewById(R.id.exercise_name);
            holder.weight = convertView.findViewById(R.id.weight);

            RowItems row_pos = rowItems.get(position);

            holder.exercise_name.setText(row_pos.getExercise());
            holder.weight.setText("Best personal record: " +row_pos.getWeight());
            convertView.setTag(holder);
        }
        else
            holder = (ViewHolder) convertView.getTag();
        return convertView;
    }
}
