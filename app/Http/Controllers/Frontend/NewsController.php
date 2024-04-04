<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\BlogPage; 
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function newsAndInsightData(Request $request)
    {
        log::info('News(blog) & Insight Data');
        log::info($request);

        $get_data       = BlogPage::first();
        $get_all_blogs  = Blog::all();
        $blogs          = [];

        foreach($get_all_blogs as $blog)
        {
            $format_date        = Carbon::parse($blog->date)->format('F d, Y');
            $slug_title         = Str::slug($blog->title);
            $short_description  = Str::limit(strip_tags($blog->description), 150);

            $blogs[]    = array(
                            'id'                => $blog->id,
                            'title'             => $blog->title,
                            'description'       => $blog->description,
                            'short_description' => $short_description,
                            'meta_title'        => $blog->meta_title,
                            'meta_tag'          => $blog->meta_tag,
                            'meta_description'  => $blog->meta_description,
                            'image'             => $blog->image,
                            'image_text'        => $blog->image_text,
                            'date'              => $format_date,
                            'slug_title'        => $slug_title,	
                        );
        }

        return view('frontend/templates/news',['get_data' => $get_data,'blogs'=> $blogs]);
    }

    // public function newsIndividualData(Request $request)
    // {
    //     log::info('News/Blog Data');
    //     log::info($request);

    //     $title   = request('title');

    //     if($title == 'define-your-home-no-doubt-about-anything')
    //     {
    //         $content    = '<p>In a world defined by tangible structures and physical spaces, the notion of "home" often conjures images of brick and mortar, warmth, and familiarity. However, in the digital age, the concept of home has transcended the confines of four walls to encompass a vast, virtual landscape— a realm where certainty reigns supreme.
    //                         In this boundless expanse of data and algorithms, doubt finds no refuge. Welcome to the home of the digital, where clarity is not just a luxury but an inherent feature. Here, the binary language speaks in absolutes, ones and zeros aligning in perfect harmony to create a sense of unwavering certainty.</p>' ;
    //         $image      = url('static/frontend/img/more-home/blog/blog-1.jpg');
    //         $image_text = 'Mortgage';
    //         $date       = 'December 27, 2022';
    //     }
    //     elseif($title == 'what-means-your-mortgage-and-5-ways-to-improve')
    //     {
    //         $content    = '<p>Your mortgage, often the gateway to homeownership, is a financial commitment that shapes the landscape of your personal and financial life. It is not just a loan; it is a stepping stone toward building equity and securing a place to call your own. Lets delve into the significance of your mortgage and explore five ways to enhance your financial standing through its management.</p><p>Firstly, a mortgage is a loan secured by real estate—your home. It is a financial agreement that allows you to spread the cost of your home over a specified period. The home serves as collateral, offering the lender security. For most, a mortgage is the means to achieve the dream of homeownership, providing a stable foundation for family life and long-term financial goals.</p><p>Now, lets talk about improving your mortgage game:<ul><li><strong>Refinance wisely:</strong> Keep an eye on interest rates and consider refinancing if there is a chance to secure a lower rate. This could potentially reduce your monthly payments and save you money in the long run.</li><li><strong>Make extra payments:</strong> If your financial situation allows, consider making extra payments on your mortgage. This not only reduces the principal faster but also saves on interest payments over the life of the loan.</li><li><strong>Understand your terms:</strong> Take the time to thoroughly understand the terms of your mortgage. Know whether you have a fixed-rate or adjustable-rate mortgage, and be aware of any penalties or fees associated with early payments or refinancing.</li><li><strong>Create a budget:</strong> A solid budget is your ally in managing your mortgage effectively. It helps you allocate funds for your mortgage payments, avoid unnecessary expenses, and stay on track with your financial goals.</li><li><strong>Build equity: </strong>Increasing your homes value through renovations or market appreciation can boost your equity. This not only enhances your financial standing but may also open up opportunities for home equity loans or lines of credit.</li></ul></p><p>Your mortgage is not just a financial transaction; it is a journey toward financial stability and homeownership. By navigating this path with awareness and strategic planning, you can not only meet your financial obligations but also optimize your mortgage for a more secure and prosperous future.</p>' ;

    //         $image      = url('static/frontend/img/more-home/blog/blog-2.jpg');
    //         $image_text = 'Technology';
    //         $date       = 'December 27, 2022';
    //     }
    //     elseif($title == '5-ways-to-build-yourself-by-hardworking')
    //     {  
    //         $content    = '<p>Hard work is the cornerstone of personal and professional growth, a tireless companion on the journey of self-improvement. Here are five ways to harness the power of hard work and build yourself into the best version you aspire to be:</p><p><ul><li><strong>Set Clear Goals:</strong> Hard work gains purpose when directed toward specific goals. Define your objectives clearly, whether they are related to your career, personal development, or health. Having a roadmap provides a sense of direction, turning your hard work into a focused effort.</li><li><strong>Consistency is Key: </strong>Building oneself is not a sprint but a marathon. Consistent, sustained effort over time yields remarkable results. Make hard work a daily habit, embracing the small, incremental steps that pave the way for substantial progress.</li><li><strong>Embrace Challenges:</strong> Growth often lies on the other side of challenges. Donnot shy away from difficult tasks; instead, view them as opportunities to stretch your abilities. The resilience built through overcoming challenges contributes significantly to your personal development.</li><li><strong>Learn Continuously:</strong> Hard work goes hand in hand with a thirst for knowledge. Stay curious, seek new experiences, and be open to learning. Whether through formal education or self-directed exploration, continuous learning fuels your personal growth engine.</li><li><strong>Reflect and Adapt:</strong> Hard work becomes more effective when coupled with reflection. Take the time to assess your progress, celebrate achievements, and learn from setbacks. Adapt your strategies as needed, making hard work a dynamic and evolving force in your journey of self-building.</li></ul></p><p>In the realm of personal development, hard work is the sculptor chisel, shaping raw potential into refined excellence. By setting goals, maintaining consistency, embracing challenges, fostering a learning mindset, and reflecting on your journey, you not only build a stronger version of yourself but also cultivate the resilience and determination that are the hallmarks of enduring success.</p>' ;

    //         $image      = url('static/frontend/img/more-home/blog/blog-3.jpg');
    //         $image_text = 'Mortgage';
    //         $date       = 'December 27, 2022';
    //     }
    //     elseif($title == 'mortgage-process-in-the-uae')
    //     {
    //         $content    = '<p>Navigating the mortgage process in the UAE is a unique journey shaped by the  financial landscape and regulatory framework. Here is a brief guide to demystify the steps involved in securing a mortgage in the United Arab Emirates:</p><p><ul><li><strong>Financial Assessment:</strong>The journey begins with a thorough financial assessment. Lenders in the UAE scrutinize your income, credit history, and existing financial commitments to determine your eligibility for a mortgage. It is crucial to have a clear understanding of your financial standing before embarking on the application process.</li><li><strong>Pre-Approval:</strong>Once your financial health is assessed, obtaining a pre-approval is a prudent step. This involves the lender providing a tentative commitment to lend you a specific amount, helping you narrow down your property search within a realistic budget.</li><li><strong>Property Selection:</strong>With pre-approval in hand, you can explore properties within your budget. Keep in mind that the UAE real estate market offers a diverse range of options, from apartments in bustling city centers to luxurious villas in serene suburbs.</li><li><strong>Legal Due Diligence:</strong>Before finalizing your property choice, engage in legal due diligence. Ensure that the property adheres to all regulations and is free from any legal encumbrances. Legal processes in the UAE are crucial to safeguarding your investment.</li><li><strong>Formal Mortgage Application:</strong>Once you have selected a property and completed the legal checks, it is time to submit a formal mortgage application. Be prepared to provide comprehensive documentation, including proof of income, residency status, and details about the property.</li><li><strong>Valuation and Approval:</strong>The lender conducts a valuation of the property to ensure it aligns with the proposed loan amount. Following a satisfactory valuation, the application undergoes a formal approval process. This stage involves a thorough assessment of the property and your financial viability.</li><li><strong>Offer Letter and Signing:</strong>Upon approval, the lender issues an offer letter specifying the terms and conditions of the mortgage. Once you accept the offer, the legal documentation is prepared, and you proceed to sign the mortgage agreement.</li><li><strong>Registration and Disbursement:</strong>The final steps involve registering the mortgage with the relevant authorities and disbursing the loan amount to the seller. This culminates in the transfer of ownership and the initiation of your mortgage repayment journey.</li></ul></p><p>Understanding the intricacies of the mortgage process in the UAE is essential for a smooth and informed home-buying experience. By navigating each step with diligence and awareness, you can unlock the doors to homeownership in this dynamic and vibrant region.</p>' ;

    //         $image      = url('static/frontend/img/more-home/blog/blog-4.jpg');
    //         $image_text = 'Technology';
    //         $date       = 'December 27, 2022';
    //     }
    //     $title          = str_replace('-', ' ', $title);
    //     $title          = ucfirst($title);
    //     $response       =   [
    //                             'title'     => $title,
    //                             'content'   => $content,
    //                             'image'     => $image,
    //                             'image_text'=> $image_text,
    //                             'date'      => $date
    //                         ];
    //     return view('frontend/templates/news_individual',['response' => $response]);
    // }


    public function newsIndividualData(Request $request)
    {
        log::info('News/Blog Data');
        log::info($request);

        $id         =   request('id');
        $get_data   =   DB::table('blogs')->where('id','=',$id)->first();
        
        return view('frontend/templates/news_individual',['get_data' => $get_data]);
    }
}
