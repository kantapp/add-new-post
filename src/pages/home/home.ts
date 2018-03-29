import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Http,URLSearchParams } from '@angular/http';
import  'rxjs/Rx';
@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  title:any;
  by:any;
  bodyss:any;
  constructor(public navCtrl: NavController,private http:Http) 
  {

  }

  save()
  {
    let data=new URLSearchParams();
    data.append('title',this.title);
    data.append('by',this.by);
    data.append('body',this.bodyss);

    // this.http.post("http://localhost:8080/addPost",data).map(res=>res.json()).subscribe(data=>{
    //   console.log(data);
    // });

    console.log(this.by);

    console.log(this.bodyss);
  }

}
