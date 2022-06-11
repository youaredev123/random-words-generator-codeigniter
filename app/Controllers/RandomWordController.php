<?php 
namespace App\Controllers;
use App\Models\RandomWordModel;
use CodeIgniter\Controller;
class RandomWordController extends Controller
{
    // show words list
    public function index(){
        $randomWordModel = new RandomWordModel();
        $data['randomWords'] = $randomWordModel->orderBy('id', 'DESC')->findAll();
        return view('index', $data);
    }
    // Add word form 
    public function create(){
        return view('create');
    }
 
    // Insert data
    public function store() {
        // custom helper load to use generateRandomWord() function
        helper("custom");

        $randomWordModel = new RandomWordModel();
        // User's name
        $name = $this->request->getVar("name"); 
        
        // Option to select the alphabet, Numerical, or both. Should be ['A'], ['N'], ['A', 'N']
        $option = $this->request->getVar("option");
        // Quantity of random words to generate Should be 10, 100, 1000, 10000
        $quantity = intval($this->request->getVar("quantity"));

        $words = array(); // Array of words to store multi record to database at once
        for($i = 0; $i < $quantity; $i++){
            
            /**  
             *Generate random word with generateRandomWord 
             *generateRandomWord is a custom helper functon by added Denis
             *Located  app/Helpers/custom_helper.php 
             */
            $word = generateRandomWord($option); 

            $words[] = ["word" => $name . $word]; // User name + Random word            
        }
        // Store multi record to database at once
        $randomWordModel->insertBatch($words);

        return $this->response->redirect(site_url('/index'));
    }

    // Show data to edit
    public function edit($id = null){
        $randomWordModel = new RandomWordModel();
        $data['randomWord'] = $randomWordModel->where('id', $id)->first();
        return view('edit', $data);
    }
    
    // Update word
    public function update(){
        $randomWordModel = new RandomWordModel();
        $id = $this->request->getVar('id');
        $data = [
            'word' => $this->request->getVar('word'),
        ];
        $randomWordModel->update($id, $data);
        return $this->response->redirect(site_url('/index'));
    }
 
    // Delete word
    public function delete($id = null){
        $randomWordModel = new RandomWordModel();
        $data['randomWord'] = $randomWordModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/index'));
    }    
}