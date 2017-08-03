import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-course-list',
  templateUrl: './course-list.component.html',
  styleUrls: ['./course-list.component.css']
})
export class CourseListComponent implements OnInit {

  constructor(private api: ApiService) { }

  courses = [
    {name:"Chemistry 101", teacher:"Joe", credit:"5"},
    {name:"Angular 101", teacher:"Baby", credit:"5"},
    {name:"PHP 101", teacher:"Greg", credit:"5"},
    ];

  model:any = {};

   addCourse(){
    this.courses.push(this.model);
    this.model = {};
  }

  deleteCourse(i){

  }

  ngOnInit() {
  }




}
