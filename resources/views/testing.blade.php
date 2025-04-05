<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Pest Test Examples in Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans leading-relaxed">

    <div class="container mx-auto my-8 p-4 sm:p-6 bg-white rounded-lg shadow-lg">

        <h1 class="text-3xl sm:text-4xl font-semibold text-center text-blue-600 mb-6">Simple Pest Test Examples in Laravel</h1>

        <div class="space-y-6">
            <p class="text-lg sm:text-xl">This guide will show you multiple test examples in Laravel using <strong>Pest</strong>. We will demonstrate different types of tests to help beginners get started.</p>

            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">1. Create a Test File</h2>
            <p>Create a new test file using the following command:</p>
            <pre class="bg-gray-100 p-4 rounded-lg text-sm sm:text-base font-mono">php artisan pest:test ExampleTest</pre>
            <p>This will create a file called <code>tests/Feature/ExampleTest.php</code>.</p>

            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">2. Write the Test</h2>
            <p>Let’s now write a few test cases in the <code>tests/Feature/ExampleTest.php</code> file.</p>

            <div class="bg-gray-100 p-4 rounded-lg">
<pre class="text-sm sm:text-base font-mono text-gray-800">
&lt;?php

use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Example 1: Testing a GET request for the /api/welcome endpoint
it('returns a successful response for /api/welcome', function () {
    // Send GET request to the /api/welcome endpoint
    $response = get('/api/welcome');

    // Assert that the response status is 200 OK
    $response->assertOk();
});

// Example 2: Testing a POST request for login with valid credentials
it('logs in a user and returns a token', function () {
    // Create a user with known credentials
    $user = User::factory()->create([
        'email' => 'testuser@example.com',
        'password' => Hash::make('password123'),
    ]);

    // Send POST request to /api/login
    $response = postJson('/api/login', [
        'email' => 'testuser@example.com',
        'password' => 'password123',
    ]);

    // Assert that the login is successful and contains a token
    $response->assertOk()
                ->assertJsonStructure([
                    'data' => ['token', 'user_reference'],
                ]);
});

// Example 3: Testing a failed login with invalid credentials
it('fails to log in with invalid credentials', function () {
    // Send POST request with incorrect credentials
    $response = postJson('/api/login', [
        'email' => 'invalid@example.com',
        'password' => 'wrongpassword',
    ]);

    // Assert that the login failed with a 401 status
    $response->assertStatus(401);
});
</pre>
            </div>

            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">3. Explanation</h2>
            <p>Here’s what each part of the test does:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li><strong>Example 1:</strong> We are testing a simple <code>GET</code> request to the <code>/api/welcome</code> route to ensure it returns a successful response with status <code>200 OK</code>.</li>
                <li><strong>Example 2:</strong> We test a successful user login by creating a test user, then sending a <code>POST</code> request to the <code>/api/login</code> endpoint with correct credentials. The test checks that a token is returned upon successful authentication.</li>
                <li><strong>Example 3:</strong> We test a failed login attempt by sending incorrect login credentials and assert that the response returns a <code>401 Unauthorized</code> status.</li>
            </ul>

            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">4. Run the Test</h2>
            <p>To run all your tests, use the following command:</p>
            <pre class="bg-gray-100 p-4 rounded-lg text-sm sm:text-base font-mono">php artisan test</pre>
            <p>Alternatively, you can run Pest directly with:</p>
            <pre class="bg-gray-100 p-4 rounded-lg text-sm sm:text-base font-mono">pest</pre>

            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">5. Run a Specific Test File</h2>
            <p>If you want to run just a specific test file (e.g., <code>ExampleTest.php</code>), you can use the following command:</p>
            <pre class="bg-gray-100 p-4 rounded-lg text-sm sm:text-base font-mono">php artisan test tests/Feature/ExampleTest.php</pre>
            <p>Alternatively, with Pest, you can run:</p>
            <pre class="bg-gray-100 p-4 rounded-lg text-sm sm:text-base font-mono">pest tests/Feature/ExampleTest.php</pre>
            <p>This will run the tests only inside the <code>ExampleTest.php</code> file.</p>

            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">6. Expected Output</h2>
            <p>If everything is set up correctly, Pest will run the test and you should see something like this:</p>
            <div class="bg-gray-100 p-4 rounded-lg">
<pre class="text-sm sm:text-base font-mono text-gray-800">
PASS  Tests\Feature\ExampleTest
✓ returns a successful response for /api/welcome
✓ logs in a user and returns a token
✓ fails to log in with invalid credentials
</pre>
            </div>

            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">7. Tips for Beginners</h2>
            <ul class="list-disc pl-6 space-y-2">
                <li><strong>Factories:</strong> Use factories to quickly generate test data like users. For example, <code>User::factory()->create()</code> creates a user for you.</li>
                <li><strong>Assertions:</strong> Use assertions like <code>assertOk()</code> to check that the response status is 200 or use <code>assertStatus(401)</code> to check for failure responses.</li>
                <li><strong>Debugging:</strong> If a test fails, use <code>$response->dump();</code> to inspect the response data.</li>
            </ul>

        </div>
    </div>

</body>
</html>
