<?php 

class Category extends Eloquent{
    protected $table = "categories";
    protected $fillable = ["name","image","created","updated"];
}