<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق من أن المستخدم مسجل الدخول وأن لديه صلاحيات المشرف
        if (auth()->check() && auth()->user()->role === 'admin') {
            // السماح بالمرور إلى المسار المطلوب
            return $next($request);
        }

        // إذا لم يكن المستخدم مشرفًا، يمكن إعادة توجيهه إلى الصفحة الرئيسية
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}



?>