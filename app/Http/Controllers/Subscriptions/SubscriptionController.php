<?php

namespace App\Http\Controllers\Subscriptions;
use App\Models\Plans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe;
use Session;
use Exception;

class SubscriptionController extends Controller
{
    public function index()
    {
        $data = [
            'intent' => auth()->user()->createSetupIntent(),
        ];

        return view('subscriptions.subscribe')->with($data);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $plan = Plans::where('identifier', $request->plan)
            ->orWhere('identifier', 'basic')
            ->first();

        $request->user()->newSubscription('default', $plan->stripe_id)->create($request->token);

        return redirect()->route('chart.index')->with('success', ' Thank you for your subscription!');
    }


    public function showSubscribe()
    {
        return view('pages.subscribe');
    }

    /**
     * Process the form
     */
    public function processSubscribe(Request $request)
    {
        // grab the user
        $user = $request->user();

        // if there is no user, we have to create one
        if ( ! $user) {
            $this->validate($request, [
                'name'     => 'required|max:255',
                'email'    => 'required|email|max:255|unique:users',
                'password' => 'required|min:6'
            ]);

            // create and login
            try {
                $user = User::create([
                    'name'     => $request->input('name'),
                    'email'    => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                ]);
                Auth::login($user);
            } catch (\Exception $e) {
                return back()->withErrors(['message' => 'Error creating user.']);
            }
        }

        // create the users subscription
        // grab the credit card token
        $ccToken = $request->input('cc_token');
        $plan = $request->input('plan');

        // create the subscription
        try {
            $user->newSubscription('main', $plan)->create($ccToken, [
                'email' => $user->email
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription.']);
        }

        return redirect('welcome');
    }

    /**
     * Show the welcome page
     */
    public function showWelcome()
    {
        $posts = Post::where('premium', true)->get();
        return view('pages.welcome', compact('posts'));
    }
}
