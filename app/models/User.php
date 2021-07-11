<?php 

class User extends Eloquent{
    protected $table = "users";
    protected $fillable = ["name","email","phone","password"];
}