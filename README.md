## Laravel 7.9.2 Import Export CSV Demo

Simple project showing how to import and export data from CSV file, also matching CSV columns with database columns.

Also showing how to deal with CSV files with/without header rows, using plain PHP functions and [maatwebsite/excel package](https://github.com/Maatwebsite/Laravel-Excel).

![Laravel Import Export CSV](https://laraveldaily.com/wp-content/uploads/2018/11/import-csv.png)

---
### Process tips to build this
- Created a project and edited database credentials
- Created a model, migration, controller blogs using this command (php artisan make:model Blog -mrc) and worked on it.
- Create a view and made working insertion for blogs and design for import export data.
- php artisan make:import BlogsImport --model=Blog
- php artisan make:export BlogsExport --model=Blog
- Check Model path on BlogsImport and BlogsExport and fixed with (use App\Models\Blog;) because I use to put model inside Models folder 
- To import:<br>
$path = $request->file('csv'); <br>
Excel::import(new BlogsImport(), $path); 
- To export:<br>
return Excel::download(new BlogsExport(), 'blog.xls');
- In controller use this Maatwebsite\Excel\Facades\Excel; instead of use Maatwebsite\Excel\Excel;

---

### How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate__
- That's it - load the homepage

---

### License

Please use and re-use however you want.

---

## Check more

- Subscribe to our [YouTube channel](https://www.youtube.com/channel/UC_YOSQyoq0nm8Mfp2ZZ8fqg)
- Check out my website [Portfolio Blogs and my works](https://binayakarki.com.np/)