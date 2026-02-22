use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    // ❌ User not found
    if (!$user) {
        return back()->withErrors([
            'email' => 'Your account has not yet been registered. Please request access from administrator.'
        ])->withInput();
    }

    // ❌ User exists but not approved
    if ($user->status !== 'approved') {
        return back()->withErrors([
            'email' => 'Your account is pending approval. Please wait for administrator confirmation.'
        ])->withInput();
    }

    // ✅ Try login
    if (Auth::attempt($request->only('email', 'password'))) {
        return redirect()->route('dashboard');
    }

    // ❌ Wrong password
    return back()->withErrors([
        'password' => 'Invalid credentials provided.'
    ])->withInput();
}