<h1> Getting Started  </h1>

<p>First you need PHP version of 8.0.10, apache2, MySQL, and Composer installed.</P>
<p> clone project:</p>
<p> git clone https://github.com/CliffMathebula/D6_API.git </p> 
<p>open the file named .env.example and changee the database name and password and save it as .env</p>

<p> Run the following commands:</p>
composer install<br/>
php artisan key:generate <br/>
php artisan jwt:secret<br/>
php artisan cache:clear<br/>
php artisan config:clear<br/>

<p>then open your postman and start testing the API, Please refer to pdf file named(post-man-usage.pdf) Document attached for reference of postman URI to be used and Http methods per route.
