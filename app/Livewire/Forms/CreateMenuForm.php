<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateMenuForm extends Form
{
    //
    public $categoryId;
         #[Rule('required|min:3', message: 'Category field is required')] 
        public $category_en;
        public $category_hin;
        public $category_pbi;
        public $category_urdu;
        public $route_link;
        public $sort_id;
        #[Rule('required|min:3', message: 'status field is required')] 

        public $status;

        public function savemenus(){
             $this->validate(); 
             $createCategory =  new Category();
             $createCategory->category_en = $this->category_en; 
             $createCategory->category_hin = $this->category_hin; 
             $createCategory->category_pbi = $this->category_pbi; 
             $createCategory->category_urdu = $this->category_urdu; 
             $createCategory->slug = createSlug($this->category_en); 
             $createCategory->route_link = $this->route_link; ; 
             $createCategory->sort_id = $this->sort_id; 
             $createCategory->status = $this->status; 
             $createCategory->ip_address = getUserIp() ; 
             $createCategory->login = authUserId(); 
             $createCategory->save();

             logActivity(
               'Category',
               $createCategory,
               [
                   'Category id'    => $createCategory->id,
                   'Category Name ' => $createCategory->category_en ,
               ],
               'Create',
               'Category has been Created!'
           );
             $this->reset();
        }

         public function setcategory(Category $cat_id){
            $this->categoryId = $cat_id->id;
            $this->category_en = $cat_id->category_en;
            $this->category_hin = $cat_id->category_hin; 
            $this->category_pbi = $cat_id->category_pbi; 
            $this->category_urdu = $cat_id->category_urdu; 
            $this->route_link = $cat_id->route_link; 
            $this->sort_id = $cat_id->sort_id; 
            $this->status = $cat_id->status; 
        }


         public function updateCategory(){
            $createCategory =   Category::find( $this->categoryId );
            $createCategory->category_en = $this->category_en; 
            $createCategory->category_hin = $this->category_hin; 
            $createCategory->category_pbi = $this->category_pbi; 
            $createCategory->category_urdu = $this->category_urdu; 
            $createCategory->slug = createSlug($this->category_en); 
            $createCategory->route_link = $this->route_link; ; 
            $createCategory->sort_id = $this->sort_id; 
            $createCategory->status = $this->status; 
            $createCategory->ip_address = getUserIp() ; 
            $createCategory->login = authUserId(); 
            $createCategory->save();

            logActivity(
               'Category',
               $createCategory,
               [
                   'Category id'    => $createCategory->id,
                   'Category Name ' => $createCategory->category_en ,
               ],
               'Update',
               'Category has been Updated!'
           );
            $this->reset();

            $this->reset();

         }
}















