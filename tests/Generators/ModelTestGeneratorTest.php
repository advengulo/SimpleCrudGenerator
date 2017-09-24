<?php

namespace Tests\Generators;

use Tests\TestCase;

class ModelTestGeneratorTest extends TestCase
{
    /** @test */
    public function it_creates_correct_unit_test_class_content()
    {
        $this->artisan('make:crud', ['name' => $this->modelName, '--no-interaction' => true]);

        $this->assertFileExists(base_path("tests/Unit/Models/{$this->modelName}Test.php"));
        $modelClassContent = "<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ItemTest extends TestCase
{
    use DatabaseMigrations;
}
";
        $this->assertEquals($modelClassContent, file_get_contents(base_path("tests/Unit/Models/{$this->modelName}Test.php")));
    }
}
