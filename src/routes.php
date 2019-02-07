<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.php', $args);
});

$app->post('/contact', function (Request $request, Response $response, array $args) {
    $parsedBody = $request->getParsedBody();
    $firstname = $parsedBody['firstname'];
    $lastname = $parsedBody['lastname'];
    $phonenumber = $parsedBody['phonenumber'];
    $email = $parsedBody['email'];
    $message = $parsedBody['message'];
    $errors = array();

    if(empty($firstname)){
        array_push($errors, array('message' => 'First Name is empty'));
    }
    if(empty($lastname)){
        array_push($errors, array('message' => 'Last Name is empty'));
    }
    if(empty($phonenumber)){
        array_push($errors, array('message' => 'Phone Number is empty'));
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, array('message' => 'Email is empty or invalid'));
    }
    if(empty($message)){
        array_push($errors, array('message' => 'Message is empty'));
    }

    if(!empty($errors)){
        return $response->withJson(array('errors' => $errors));
    }else{
        //Send email here...
        $sg = new \SendGrid\Mail\Mail(); 
        $sg->setFrom($email, "{$firstname} {$lastname}");
        $sg->setSubject("New contact form message.");
        $sg->addTo("magreen451@gmail.com", "Mary Green");
        $sg->addContent("text/plain", $message);
        $sendgrid = new \SendGrid('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');
        try {
            $sg_response = $sendgrid->send($sg);
            return $response->withJson(array('success' => "Message successfully sent. Thank you {$firstname}!",'response' => $sg_response, 'body' => $sg_response->body(), 'status' => $sg_response->statusCode()));
        } catch (Exception $e) {
           return  $response->withJson(array('error' => 'Exception when calling AccountApi->getAccount: ', $e->getMessage(), PHP_EOL));
        }
    }
});
