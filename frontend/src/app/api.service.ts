import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Http, Headers, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs/Rx';


@Injectable()
export class ApiService {


    courses = [
    {name:"Chemistry 101", teacher:"Joe", credit:"5"},
    {name:"Angular 101", teacher:"Baby", credit:"5"},
    {name:"PHP 101", teacher:"Greg", credit:"5"},
    ];
  
}
