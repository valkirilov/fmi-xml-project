<?php 

namespace App\Http\Controllers;

use URL;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
 
class JokesController extends Controller {
 
  private $xmlFileName;
  private $xmlDocument;
  private $domXPath;
  

  public function viewIndex() {
    $this->loadData();

    $jokes = $this->xml_to_array($this->xmlDocument);

    return view('jokes.index', ['jokes' => $jokes['jokes']]);
  }

  public function viewAdd() {
    return view('jokes.form', ['joke' => array()]);
  }

  public function actionAdd(Request $request) {
    $this->loadData();

    $data = $this->packData($request);
    $joke = $this->convertDataToXml($data);

    // Append the new joke in the xml document and save it
    $jokes = $this->xmlDocument->getElementsByTagName('jokes');
    $jokes->item(0)->appendChild($joke);
    $this->xmlDocument->save($this->xmlFileName);

    return redirect()->route('edit', ['id' => $data['id']]);
  }

  public function viewEdit(Request $request, $id) {
    $this->loadData();

    if ($id) {      
      $joke = $this->domXPath->query("//*[@id='".$id."']")->item(0);
    }
    else {
      $joke = array();
    }

    return view('jokes.form', ['joke' => array(
        'id' => $joke->getAttribute('id'),
        'content' => $joke->nodeValue,
        'author' => $joke->getAttribute('author'),
      )
    ]);
  }

  public function actionEdit(Request $request) {
    $this->loadData();

    $data = $this->packData($request);
    $joke = $this->convertDataToXml($data);

    $oldJoke = $this->domXPath->query("//*[@id='".$data['id']."']")->item(0);
    $oldJoke->parentNode->replaceChild($joke, $oldJoke);
    $this->xmlDocument->save($this->xmlFileName);

    return redirect()->route('edit', ['id' => $data['id']]);
  }

  private function loadData() {
    $this->xmlFileName = base_path() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'example.xml';
    $this->xmlDocument = new \DOMDocument();
    $this->xmlDocument->load($this->xmlFileName);
    //$this->xmlDocument->validate();
    
    $this->domXPath = new \DOMXPath($this->xmlDocument);
  }

  private function packData($request) {
    $id = $request->input('id') != '' ? $request->input('id') : md5(time());

    $data = array(
      'id' => $id,
      'content' => $request->input('content'),
      'author' => $request->input('author'),
      'date' => $request->input('lecture'),
      'lecture' => $request->input('date'),
      'occasion' => $request->input('occasion'),
      'quotes' => $request->input('quotes'),
      'context' => $request->input('context'),
      'lesson' => $request->input('lesson'),
      'rating' => $request->input('rating'),
    );

    return $data;
  }

  private function convertDataToXml($data) {
    $joke = $this->xmlDocument->createElement('joke', $data['content']);
    
    $id = $this->createAttribute('id', $data['id']);
    $joke->appendChild($id);

    $author = $this->createAttribute('author', $data['author']);
    $joke->appendChild($author);

    $date = $this->createAttribute('date', $data['date']);
    $joke->appendChild($date);

    $lecture = $this->createAttribute('lecture', $data['lecture']);
    $joke->appendChild($lecture);

    $occasion = $this->createAttribute('occasion', $data['occasion']);
    $joke->appendChild($occasion);

    $quotes = $this->createAttribute('quotes', $data['quotes']);
    $joke->appendChild($quotes);

    $context = $this->createAttribute('context', $data['context']);
    $joke->appendChild($context);

    $lesson = $this->createAttribute('lesson', $data['lesson']);
    $joke->appendChild($lesson);

    $rating = $this->createAttribute('rating', $data['rating']);
    $joke->appendChild($rating);  

    return $joke;
  }

  private function createAttribute($name, $value) {
    $attribute = $this->xmlDocument->createAttribute($name);
    $attribute->value = $value;

    return $attribute;
  }

  private function xml_to_array($root) {
    $result = array();

    if ($root->hasAttributes()) {
        $attrs = $root->attributes;
        foreach ($attrs as $attr) {
            $result['@attributes'][$attr->name] = $attr->value;
        }
    }

    if ($root->hasChildNodes()) {
        $children = $root->childNodes;
        if ($children->length == 1) {
            $child = $children->item(0);
            if ($child->nodeType == XML_TEXT_NODE) {
                $result['_value'] = $child->nodeValue;
                return count($result) == 1
                    ? $result['_value']
                    : $result;
            }
        }
        $groups = array();
        foreach ($children as $child) {
            if (!isset($result[$child->nodeName])) {
                $result[$child->nodeName] = $this->xml_to_array($child);
            } else {
                if (!isset($groups[$child->nodeName])) {
                    $result[$child->nodeName] = array($result[$child->nodeName]);
                    $groups[$child->nodeName] = 1;
                }
                $result[$child->nodeName][] = $this->xml_to_array($child);
            }
        }
    }

    return $result;
  }


}