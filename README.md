# Eloquent Report Generator

This package can be used to generate reports from Eloquent models 
in many formats, such as CSV, PDF, Markdown, and HTML.

## Installation

To install, just run the following composer command.

```bash
composer require langleyfoxall/eloquent-report-generator
```

Remember to include the `vendor/autoload.php` file if your framework 
does not do this for you.

## Usage

First, add the `Reportable` trait to the model or models you wish to
create reports from.

```php
namespace App;

use Illuminate\Database\Eloquent\Model;
use LangleyFoxall\EloquentReportGenerator\Traits\Reportable;

class User extends Model
{
    use Reportable;
    
    // ...
```

You can then generate reports elsewhere in your application by calling the static `generateReport` method from this trait.

See the following code snippet for example usage.

```php
// Report format
$format = (new CsvReportFormat());
//$format = (new PdfReportFormat());
//$format = (new MarkdownReportFormat());
//$format = (new HtmlReportFormat());

// Report generation
User::generateReport()
    ->format($format)
    ->query(function ($query) {
        // Restrict the records used in the report
        $query->where('created_at', '>=' '2018-01-01');  
    })
    ->fields(['email', 'name', 'created_at'])
    ->fieldMap([
        // Change how fields appear in the report
        'email' => 'Email address',
        'name' => 'Name',
        'created_at' => 'Joined Date',
    ])
    ->dataRowManipulator(function (DataRow $dataRow) {
        // Format the 'name' field
        $name = $dataRow->getDataItemByFieldName('name');
        $name->value = ucwords($name);
    }
    ->save(storage_path('app/report.csv'));
```
