<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Git Workflow Guide</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans p-6">
  <div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">🔧 Git Workflow Guide</h1>

    <section class="mb-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-2">1. Create a Branch</h2>
      <p class="mb-2">Keep your work isolated until it's ready.</p>
      <pre class="bg-gray-100 p-4 rounded text-sm"><code>git checkout -b feature/products-model-and-controller</code></pre>
    </section>

    <section class="mb-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-2">2. Write Descriptive Commit Messages</h2>
      <p class="mb-2">Use the format:</p>
      <pre class="bg-gray-100 p-4 rounded text-sm"><code>feat(scope): short description</code></pre>
      <p class="mb-2">Example:</p>
      <pre class="bg-gray-100 p-4 rounded text-sm"><code>git add .
git commit -m "feat(products): add model, migration, and controller"</code></pre>
    </section>

    <section class="mb-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-2">3. Use Meaningful Commit Types</h2>
      <ul class="list-disc pl-6 mb-2">
        <li><strong>feat</strong> – for new features</li>
        <li><strong>fix</strong> – for bug fixes</li>
        <li><strong>refactor</strong> – for improving code structure</li>
        <li><strong>docs</strong> – for documentation updates</li>
      </ul>
      <pre class="bg-gray-100 p-4 rounded text-sm mb-2"><code>git commit -m "fix(products): fix missing price validation"
git commit -m "refactor(products): move logic to service"</code></pre>
    </section>

    <section class="mb-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-2">4. Push Your Branch</h2>
      <pre class="bg-gray-100 p-4 rounded text-sm"><code>git push origin feature/products-model-and-controller</code></pre>
    </section>

    <section class="mb-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-2">5. Open a Pull Request (PR)</h2>
      <p class="mb-2">Give it a clear title and describe what you added.</p>
    </section>

    <section class="mb-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-2">6. Tips for Clean History</h2>
      <ul class="list-disc pl-6 mb-2">
        <li>Make small, focused commits</li>
        <li>Use <code>.gitignore</code> for temp/build files</li>
        <li>Pull the latest changes often:</li>
      </ul>
      <pre class="bg-gray-100 p-4 rounded text-sm"><code>git pull origin main --rebase</code></pre>
    </section>

    <section class="mb-10">
      <h2 class="text-2xl font-semibold text-gray-700 mb-2">✅ Example Flow Summary</h2>
      <pre class="bg-gray-100 p-4 rounded text-sm mb-2"><code>git checkout -b feature/products-model-and-controller
# make changes
git add .
git commit -m "feat(products): add model, migration, and controller"
git push origin feature/products-model-and-controller</code></pre>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold text-gray-700 mb-2">💡 Commit Types Cheat Sheet</h2>
      <table class="w-full text-sm text-left text-gray-700 border">
        <thead class="bg-gray-200">
          <tr>
            <th class="px-4 py-2">Type</th>
            <th class="px-4 py-2">Purpose</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t">
            <td class="px-4 py-2">feat</td>
            <td class="px-4 py-2">New feature</td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-2">fix</td>
            <td class="px-4 py-2">Bug fix</td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-2">docs</td>
            <td class="px-4 py-2">Documentation changes</td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-2">style</td>
            <td class="px-4 py-2">Formatting, spacing, etc.</td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-2">refactor</td>
            <td class="px-4 py-2">Code changes without behavior change</td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-2">test</td>
            <td class="px-4 py-2">Add or fix tests</td>
          </tr>
          <tr class="border-t">
            <td class="px-4 py-2">chore</td>
            <td class="px-4 py-2">Other routine tasks</td>
          </tr>
        </tbody>
      </table>
    </section>

    <section class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">7. Update documentation</h2>
        <p class="mb-2">If working on API requests, add comments to update scribe documentation (see Api/UserController)</p>
        <p class="mb-2">Update documentation:</p>
        <pre class="bg-gray-100 p-4 rounded text-sm"><code>php artisan scribe:generate</code></pre>
      </section>
  </div>
</body>
</html>
